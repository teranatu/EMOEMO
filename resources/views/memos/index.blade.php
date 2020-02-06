@extends('layout')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container m-0">
    <a class="navbar-brand " href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <!-- navbar左 -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>

    </div>
  </div>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          username
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">色の作成</a>
          <a class="dropdown-item" href="#">#の作成</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">ログアウト</a>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
</nav>
        <!-- <a href="#" class="btn btn-primary float-right">Username</a>
        <a href="memos/create" class="btn btn-primary float-right">新規作成</a> -->


  <hr/>
  <h1>Memos</h1>
  <hr/>

  @foreach($memos as $memo)
    <article>
      <h2>
        <a href="{{ url('memos', $memo->id) }}">
          {{ $memo->memo_title }}
        </a>
      </h2>
    </article>
  @endforeach
@endsection
