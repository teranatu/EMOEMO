@extends('layouts.app')
        
@section('content')
<!-- Start Home Section -->
    <div id="home">

        <div class="landing">
            <div class="home-wrap">
                <div class="back">
                </div>
            </div>
        </div>

        <div class="container caption text-center">
            <div class="row">
                <div class=" col-md-3">
                </div>
                <div class="col-12 col-md-6">
                    <h1> あなたのメモには<br>価値がある</h1>

                    <h2 class="color4 pt-4 mb-5">
                        「
                        <sapn class="color2">emotional</sapn>
                        」で「
                        <span class="color1">easy</span>
                        」な「
                        <span class="color3">memo</span>
                        」
                    </h2>

                    <a class="btn-2" onclick="location.href='/auth/twitter'">早速始める</a>
                </div>
                <div class=" col-md-3">
                </div>
            </div>
        </div>
    </div>
<!-- End Home Section -->

<!-- Start landing -->
<div class="mtb-6 bgc">

    <!-- Start 機能と利点紹介 -->
    <!-- End 機能と利点紹介 -->
<!-- Start landing Section 1 -->
    <div class="row">
        <div class="col-3 d-none d-sm-block"></div>
        <div class="col-sm-12 col-xl-2 ">
            <img class="bdr card m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582103970/PROJECT_EMOEMO/EMOEMO_LP/undraw_share_link_qtxe_xa1_jlulq9.png">
        </div>
        <div class="text-center col-sm-12 col-xl-4 text-xl-left">
            <div class="color_w">
                <h1 class="color2">
                    Twitter連携でメモをtweetする機能
                </h1>
            </div>
            <div class="color_w mt-4">
                <p>
                    ・メモアプリで編集&コピーしてTwitterにペースト？<br>
                    =>EMOEMOで編集し１クリックでtweetし楽チン！<br>
                <p>
                <p>
                    ・画像も送れるの？<br>
                    =>画像もtweetと一緒に送信可能！(4枚まで)<br>
                <p>
            </div>
        </div>
        <div class="col-3 d-none d-sm-block"></div>
    </div>
<!-- End landing Section 1 -->

<!-- Start landing Section 2 -->
    <div class="row mt-5">
        <div class="col-3 d-none d-sm-block order-0"></div>
        <div class="text-center col-sm-12 col-xl-4 text-xl-left order-2 order-xl-1">
            <div class="color_w">
                <h1 class="color1">
                よりわかりやすいメモ機能
                </h1>
            </div>
            <div class="color_w mt-4">
                <p>
                ・色々なメモアプリがあるけど、機能多すぎて慣れるのが面倒？<br>
                =>シンプルに作られているのでなんとなくで使えます！
                </P>
                <p>
                ・シンプルすぎて使いにくい？<br>
                =>tweetする様にメモすることが出来るので、使い易いです！
                </p>
            </div>
        </div>
        <div class="col-sm-12 col-xl-2 order-1 order-xl-2">
            <img class="bdr card m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582052488/PROJECT_EMOEMO/EMOEMO_LP/undraw_notes1_cf55_1_kriase.png">
        </div>
        <div class="col-3 d-none d-sm-block order-3"></div>
    </div>
<!-- End landing Section 2 -->

<!-- Start landing Section 3 -->
    <div class="row mt-5 ">
        <div class="col-3 d-none d-sm-block"></div>
        <div class="col-sm-12 col-xl-2">
            <img class="bdr card m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1581881405/PROJECT_EMOEMO/EMOEMO_LP/undraw_viral_tweet_gndb_1_uotznf.png">
        </div>
        <div class="text-center col-sm-12 col-xl-4 text-xl-left">
            <div class="color_w">
                <h1 class="color3">
                タイムライン見過ぎ防止機能
                </h1>
            </div>
            <div class="color_w mt-4">
                <p>
                    情報発信したいけど、タイムラインを見て時間浪費しちゃうんだけど？<br>
                    =>twitterを開かずにtweetできるので情報収集と発信の切替が容易！
                <p>
                <p>
                ・ツイートを管理できる？<br>
                =>ツイートしたメモを管理することもできます。
                </p>
            </div>
        </div>
        <div class="col-3 d-none d-sm-block"></div>
    </div>
<!-- End landing Section 3 -->
</div>
<!-- End landing -->

<div class="color5 mtb-6">
<!--  Start how to use  -->
    <div class="row">
        <div class="col-3"></div>

        <div class="col-xl-6">
            <div class="color_w text-center">
                <h1 class="font-weight-bold">
                    ＜つかいかた＞
                </h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h2>STEP1</h2>
                            <p class="color6">twitterアカウントで<br>ログインする</p>
                            <div>
                                <img class="bdr card mt-5 m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582055119/PROJECT_EMOEMO/EMOEMO_LP/undraw_Login_v483_1_1_l9sljv.png">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h2>STEP2</h2>
                            <p class="color6">EMOEMOで<br>メモをかく</p>
                            <div>
                                <img class="bdr card mt-5 m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582055119/PROJECT_EMOEMO/EMOEMO_LP/undraw_Login_v483_1_1_l9sljv.png">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h2>STEP3</h2>
                            <p class="color6">メモから<br>1clickでつぶやく</p>
                            <div class="text-center">
                                <img class="bdr card mt-5 m-0-a bdr_obc"  style="width: 200px; height: 200px;" src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582055119/PROJECT_EMOEMO/EMOEMO_LP/undraw_Login_v483_1_1_l9sljv.png">
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-sm-12 color4">
                            <a class="btn-2" onclick="location.href='/auth/twitter'">早速始める</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<!-- End how to use -->
</div>



<div class="bgc mt-6 pb-4">
    <div class="color_w text-center color4">
        <h1>EMOEMO</h1>
    </div>
    <div class="color_w text-center color4">
        <h2>© Tera.</h2>
    </div>
</div>



@endsection('content')
