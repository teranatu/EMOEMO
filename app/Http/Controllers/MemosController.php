<?php

namespace App\Http\Controllers;

use tmhOAuth;
use App\Http\Requests\MemoRequest;
use App\Memo;
use App\Image;
use Illuminate\Support\Facades\Auth;

//twitter send1
use ProgrammingSchool\Core\Jobs\Job;
use ProgrammingSchool\User\Models\User;
use Twitter;
//twitter send2
use Abraham\TwitterOAuth\TwitterOAuth;


//cloudynaryAPI
use JD\Cloudder\Facades\Cloudder;


class MemosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::all();

        return view('memos.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoRequest $request)
    {
        //メモを作成し格納
        $memo = Auth::user()->memos()->create($request->validated());
        //画像ファイルを配列に格納
        $images = $request->file();
        
        //imagesを回す
    foreach ($images as $image) {
        $image_name = $image->getRealPath();
        // Cloudinaryへアップロード
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        // 直前にアップロードした画像のユニークIDを取得します。
        $publicId = Cloudder::getPublicId();
        // URLを生成します
        $logoUrl = Cloudder::show($publicId, [
            'width'     => $width,
            'height'    => $height
            ]);
        //imageを作ってdbに格納
        $image = new Image;
        $image->image_name = $logoUrl;
        $image->memo_id = $memo->id;
        $image->save();
    }

        return redirect('memos')->with('status', 'メモ作成完了です');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memo = Memo::findOrFail($id);

        return view('memos.show',compact('memo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memo = Memo::findOrFail($id);

        return view('memos.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemoRequest $request, $id)
    {
        $memo = Memo::findOrFail($id);
        
        $memo->update($request->validated());

        return redirect(url('memos', [$memo->id]))->with('status', '編集完了です');;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);

        $memo->delete();

        return redirect('memos')->with('status', '削除しました。');
    }
    
    /*
    send tweet method

    1. send tweet
    2. memo tweeted boolean
    3. redirect index with tweeted
    */
    
    public function tweet($id)
    {

        $sConsumerKey = "I2PvTDbwixPZ2QBPrxENcNcD3";
        //Consumer secretの値を格納
        $sConsumerSecret = "ghOk8XvZCXBdEdZ6VdIGfjwyCPSJfIYIy5oUhMRBn40dUCofgz";
        //Access Tokenの値を格納
        $sAccessToken = "1196262629712388096-JIaNgDNJCFcLREqxk5Jv2LQ2EurCVA";
        //Access Token Secretの値を格納
        $sAccessTokenSecret = "p192bz88G0gyuWFgVlvh0mZ0sl2AGHTubvYzQD7LbACbe";

        $twObj = NULL;
        $twObj = new tmhOauth(
            array(
            "consumer_key" => 		$sConsumerKey,
            "consumer_secret" => 	$sConsumerSecret,
            "token" => 				$sAccessToken,
            "secret" => 			$sAccessTokenSecret,
            "curl_ssl_verifypeer" => false,
            )
        );
        $sUpImgBase64 = '';
        $aUploadImgParams = array();
        $iImgCode = 0;
        $sMediaIds = '';
        $iCnt = 0;
        $aResUpload = array();
        $aUpdateParams = array();
        $aResUpdate = array();

        $aImgTmpName = Image::where('memo_id', $id)->first()->image_name;
        
        //PHPでアップロードした画像をbase64エンコードします。
        $sUpImgBase64 = base64_encode(file_get_contents($aImgTmpName));
        
        //パラメータの作成
        $aUploadImgParams = array('media_data' =>  $sUpImgBase64);
        
        //base64エンコードした画像をtwitterに送信
        $iImgCode = $twObj->request( 'POST', "https://upload.twitter.com/1.1/media/upload.json", $aUploadImgParams, true, true);
        // media/upload.json の結果をjson文字列で受け取り配列に格納
        $aResUpload = json_decode($twObj->response["response"], true);
        
        //区切り文字カンマの挿入
        if($iCnt > 0) $sMediaIds .= ',';
        
        $sMediaIds .= $aResUpload['media_id'];
        $tweet = Memo::findOrFail($id)->memo_text;
        //メディアIDとツイート文字列のパラメータを作成
        $aUpdateParams = array(
        'media_ids' =>  $sMediaIds,//先ほど取得したmedia_id
        'status' =>  $tweet//つぶやき内容
        );
        
        //メディアIDとツイート文字列をTwitterに送信
        $iImgCode = $twObj->request( 'POST', "https://api.twitter.com/1.1/statuses/update.json", $aUpdateParams);

      
        


        //OAuthオブジェクトを生成する
        // $twObj = new tmhOauth(
        // array(
        // "consumer_key" => $sConsumerKey,
        // "consumer_secret" => $sConsumerSecret,
        // "token" => $sAccessToken,
        // "secret" => $sAccessTokenSecret,
        // "curl_ssl_verifypeer" => false,
        // )
        // );

        // $sTweet = Memo::findOrFail($id)->memo_text;

        // $status = $tweet;

        // Twitter::postTweet(
        //     ['status' => $status, 'media_ids' => $uploaded_media->media_id_string, 'format' => 'json']
        // );
        
        $tweeted = Memo::find($id);
        $tweeted->tweeted = 1;
        $tweeted->save();
        
        return redirect('memos')->with('status', 'tweet完了です');
    }

    /*
    sort memo tweeted method
    */
    public function sortmemotweeted()
    {
        $memos = Memo::where('tweeted', 1)->get();


        return view('memos/index',compact('memos'))->with('status', 'tweet済のメモ一覧です');

    }
}
