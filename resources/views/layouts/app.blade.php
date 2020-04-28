<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EMOEMO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/hammenu.js') }}" defer></script>
    <script src="{{ asset('js/isCount.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a href="{{ route('memos.index') }}" class="navbar-brand"><img src="https://res.cloudinary.com/dsv09nxlz/image/upload/c_scale,h_44/v1581306872/PROJECT_EMOEMO/EMOEMO_LP/logo_k5jvi5.png"></a>

<!-- Collapse button -->
<button class="navbar-toggler first-button forcebtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
<div class="animated-icon1"><span></span><span></span><span></span></div>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="navbarSupportedContent20">
				<ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="/auth/twitter">twitterログイン</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('nonetweet') }}">未ツイート</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tweeted') }}">ツイート済</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('memos.index') }}">全てのメモ</a></li>
                @if(\Route::is('memos.index'))
                    <li class="nav-item"><a class="nav-link a_cursol" data-toggle="modal" data-toggle="modal" data-target="#exampleModalScrollable">メモる</a></li>
                @endif
                    <img src="{{ Auth::user()->avatar }}" style="height: 45px;width: 45px;" class="rounded-circle border border-light">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                    </form>
                    </div>
                    </li>
                @endguest
				</ul>
			</div>
		</nav>
		<!-- End Navigation -->

        @yield('content')

    </div>
    

</body>
</html>
