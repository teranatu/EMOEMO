@extends('layouts.app')
        
@section('content')
<!-- Landing_message -->
    <div class="headerimage">
        <p class="top_view1"> 
            メモしたら<br>
            そこから呟き<br>
            あら、便利<br>
        </p>
        <p class="top_view2"> 
            メモアプリ<br>
            twitterに<br>
            コピペだるい<br>
        </p>
        <p class="top_view3"> 
            twitter<br>
            タイムラインを<br>
            見ただけで<br>
            気づけばすでに<br>
            ３０分後<br>
        </p>
        <button class="top_btn2" onclick="location.href='/auth/twitter'">
            <p class="font_recommend">今すぐ使ってみる</p>
        </button>
    </div>
    
    <section class="landing_message parent">
        <div class="color_w">
            <h2 class="color4">
                「
                <sapn class="color1">emotional</sapn>
                」で「
                <span class="color2">easy</span>
                」な「
                <span class="color3">memo</span>
                」アプリです。
            </h2>
            <p>
                メモを取り後で編集してツイートする方は多いと思います。<br>
                その際に、メモアプリからコピペするのでは無くメモを保存しておいて編集できる。<br>
                そんなアプリです。
            </p>
        </div>
    </section>

<!-- landing_flow -->

    <section class="flow">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-xl-6 col-md-12 pr-5 pl-5">
            <img src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1581326185/PROJECT_EMOEMO/EMOEMO_LP/flow_g4z2gu.png" alt="flow" title="flow">
            </div>
            <div class="col-xl-6 col-md-12 pr-5 pl-5">
                <div class="color_w text-center">
                    <h2 class="color1">
                        ①Twitterでの情報発信＆アウトプットに！
                    </h2>
                    <p>
                        勉強をしてわからない単語をとりあえずメモっておいて後から調べ、
                        まとめた事をアウトプットとしてEMOEMOからそのまま
                        twitterへ情報発信できます。
                    </p>
                </div>
                <div class="color_w pt-5">
                    <h2 class="color2">
                        ② 情報収集と発信、勉強を切り離せる
                    </h2>
                    <p>
                        情報収集は大切ですが、情報発信の為に開いたTwitterでタイムラインをみてしまっていては元も子もない。
                        EMOEMOはそれを阻止します！
                        勉強したいときは勉強。
                        Twitterで情報収集したりフォロワーと絡んだりする時はTwitterで、情報発信したい時はEMOEMOでメリハリをつけます！
                    </p>
                </div>
                <div class="color_w pt-5">
                    <h2 class="color3">
                        ③皆さんの感想お待ちしております！
                    </h2>
                    <p>
                        こんなことができたらいいな！あんなことができたらいいな！等
                        常にご意見をお待ちしております！ご気軽にこちらからお問い合わせください。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
