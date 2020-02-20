<?php

namespace App\Http\Controllers;

use Auth;
use tmhOAuth;
use App\Http\Requests\MemoRequest;
use App\Memo;
use App\Image;
// use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            // ログイン済みのときの処理
            $loginid = Auth::id();
            $memos = Memo::where('user_id', $loginid)->get();
            return view('memos.index', compact('memos'));
        } else {
          // ログインしていないときの処理
            return redirect('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::id()) {
        // ログイン済みのときの処理
            return view('memos.create');
        } else {
          // ログインしていないときの処理
            return redirect('/');
        }
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
    $i = 0;
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
        $i++;
        $image = new Image;
        $image->image_name = $logoUrl;
        $image->image_number = $i;
        
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
        $images = Image::where('memo_id', $id)->get();

        if ($memo->user_id == Auth::id() ) {
            // ログインしている時の処理
            return view('memos.show',compact('memo', 'images'));
        } else {
            // ログインしていない時の処理
            return redirect('/');
        }
        

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
        $images = Image::where('memo_id', $id)->get();

        if ($memo->user_id == Auth::id() ) {
            // ログインしている時の処理
            return view('memos.edit',compact('memo', 'images'));
        } else {
            // ログインしていない時の処理
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemoRequest $request , $id)
    {
        $memo = Memo::findOrFail($id);
        $memo->update($request->validated());
        
        //メモを作成し格納
        // $memo = Auth::user()->memo()->update($request->validated());
        //画像ファイルを順番に格納
        $image1 = $request->file('image_name1');
        $image2 = $request->file('image_name2');
        $image3 = $request->file('image_name3');
        $image4 = $request->file('image_name4');
        
        if ($image1)
        {//1枚目にファイルがあった場合、分岐

                if ($m_image = Image::where('memo_id', $id)->where('image_number', 1)->first())

            {//元々ファイルが存在していた場合、置換する。
                    $publicId = $m_image->image_name;
                    Cloudder::destroyImage($publicId);
                    Cloudder::delete($publicId);
                    
                    $image_name = $image1->getRealPath();
                    // Cloudinaryへアップロード
                    Cloudder::upload($image_name, null);
                    list($width, $height) = getimagesize($image_name);
                    // 直前にアップロードした画像のユニークIDを取得します。
                    $publicId = Cloudder::getPublicId();
                    // URLを生成します
                    $ImageUrl = Cloudder::show($publicId, [
                        'width'     => $width,
                        'height'    => $height
                        ]);
                        
                        //画像のURLを格納する
                        $m_image->image_name = $ImageUrl;
                        $m_image->save();
            }
            else 
            {//元々ファイルが存在していない場合、新規で作成する。

                    $image_name = $image1->getRealPath();
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
                    $image->image_number = 1;
                    $image->memo_id = $memo->id;
                    $image->save();
            }
        } //分岐１終了

        if ($image2) 
        {//2枚目にファイルがあった場合、分岐

            if ($m_image = Image::where('memo_id', $id)->where('image_number', 2)->first())
            {//元々ファイルが存在していた場合、置換する。

                    $publicId = $m_image->image_name;
                    Cloudder::destroyImage($publicId);
                    Cloudder::delete($publicId);
                    
                    $image_name = $image2->getRealPath();
                    // Cloudinaryへアップロード
                    Cloudder::upload($image_name, null);
                    list($width, $height) = getimagesize($image_name);
                    // 直前にアップロードした画像のユニークIDを取得します。
                    $publicId = Cloudder::getPublicId();
                    // URLを生成します
                    $ImageUrl = Cloudder::show($publicId, [
                        'width'     => $width,
                        'height'    => $height
                        ]);
                        
                        //画像のURLを格納する
                        $m_image->image_name = $ImageUrl;
                        $m_image->save();
            }
            else 
            {//元々ファイルが存在していない場合、新規で作成する。

                    $image_name = $image2->getRealPath();
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
                    $image->image_number = 2;
                    $image->memo_id = $memo->id;
                    $image->save();
            }
        }//分岐2終了
        
        if ($image3)
        {//3枚目にファイルがあった場合

            if ($m_image = Image::where('memo_id', $id)->where('image_number', 3)->first())
            {//元々ファイルが存在していた場合、置換する。

                    $publicId = $m_image->image_name;
                    Cloudder::destroyImage($publicId);
                    Cloudder::delete($publicId);
                    
                    $image_name = $image3->getRealPath();
                    // Cloudinaryへアップロード
                    Cloudder::upload($image_name, null);
                    list($width, $height) = getimagesize($image_name);
                    // 直前にアップロードした画像のユニークIDを取得します。
                    $publicId = Cloudder::getPublicId();
                    // URLを生成します
                    $ImageUrl = Cloudder::show($publicId, [
                        'width'     => $width,
                        'height'    => $height
                        ]);
                        
                        //画像のURLを格納する
                        $m_image->image_name = $ImageUrl;
                        $m_image->save();
            }
                else 
            {//元々ファイルが存在していない場合、新規で作成する。
                    $image_name = $image3->getRealPath();
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
                    $image->image_number = 3;
                    $image->memo_id = $memo->id;
                    $image->save();
            }
        }//分岐3終了

        if ($image4) 
        {//4枚目にファイルがあった場合
            
            if ($m_image = Image::where('memo_id', $id)->where('image_number', 4)->first())
            {//元々ファイルが存在していた場合、置換する。

                    $publicId = $m_image->image_name;
                    Cloudder::destroyImage($publicId);
                    Cloudder::delete($publicId);
                    
                    $image_name = $image4->getRealPath();
                    // Cloudinaryへアップロード
                    Cloudder::upload($image_name, null);
                    list($width, $height) = getimagesize($image_name);
                    // 直前にアップロードした画像のユニークIDを取得します。
                    $publicId = Cloudder::getPublicId();
                    // URLを生成します
                    $ImageUrl = Cloudder::show($publicId, [
                        'width'     => $width,
                        'height'    => $height
                        ]);
                        
                        //画像のURLを格納する
                        $m_image->image_name = $ImageUrl;
                        $m_image->save();
            }
                else 
            {//元々ファイルが存在していない場合、新規で作成する。
                    $image_name = $image4->getRealPath();
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
                    $image->image_number = 4;
                    $image->memo_id = $memo->id;
                    $image->save();
            }
        }//分岐4終了

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

        $user = Auth::user();

        $sConsumerKey = env('TWITTER_CONSUMER_KEY');
        //Consumer secretの値を格納
        $sConsumerSecret = env('TWITTER_CONSUMER_SECRET');
        //Access Tokenの値を格納
        $sAccessToken = $user->token;
        //Access Token Secretの値を格納
        $sAccessTokenSecret = $user->tokenSecret;
        
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

        // $aImgTmpNames = Image::where('memo_id', $id)->get('image_name');
        // $aImgTmpNames = Image::where('memo_id', $id)->get('image_name');
        $aImgTmpNames = Image::where('memo_id', $id)->get();
        
        foreach($aImgTmpNames as $sImgTmpName){
            $sImgTmpName = $sImgTmpName->image_name;
            
            //PHPでアップロードした画像をbase64エンコードします。
        $sUpImgBase64 = base64_encode(file_get_contents($sImgTmpName));
        //パラメータの作成
        $aUploadImgParams = array('media_data' =>  $sUpImgBase64);
        
        //base64エンコードした画像をtwitterに送信
        $iImgCode = $twObj->request( 'POST', "https://upload.twitter.com/1.1/media/upload.json", $aUploadImgParams, true, true);
        // media/upload.json の結果をjson文字列で受け取り配列に格納
        $aResUpload = json_decode($twObj->response["response"], true);
        
        //区切り文字カンマの挿入
        if($iCnt > 0) $sMediaIds .= ',';
        
        $sMediaIds .= $aResUpload['media_id'];

        $iCnt++;
    if($iCnt > 3) break;//最大4ファイル
    }


        $tweet = Memo::findOrFail($id)->memo_text;
        //メディアIDとツイート文字列のパラメータを作成
        $aUpdateParams = array(
        'media_ids' =>  $sMediaIds,//先ほど取得したmedia_id
        'status' =>  $tweet//つぶやき内容
        );
        
        //メディアIDとツイート文字列をTwitterに送信
        $iImgCode = $twObj->request( 'POST', "https://api.twitter.com/1.1/statuses/update.json", $aUpdateParams);

        
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
