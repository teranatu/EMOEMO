@extends('layouts.app')

@section('content')
<div class="memos_header sticky-top"></div>
@include('errors.alert')
@include('errors.form_errors')

<h1 class="text-center mt-4">メモ</h1>

<!-- details card section starts from here -->
<div class="row">
  <div class="col-md-2 col-sm-12 text-center">


<!-- Button trigger modal -->
<div>
  <button type="button" class="btn btn-primary color_btn" data-toggle="modal" data-target="#exampleModalScrollable">
    メモる
  </button>
</div>
  <!-- Button trigger modal -->
<div class="mt-3">
  <button type="button" class="btn btn-primary color_btn" onclick="window.open('https://twitter.com/','_blank')">
    twitterを開く
  </button>
</div>

@include('modal.memo')

<div class="col-2 d-block d-md-none"></div>


  <div class="col-8">
    <div class="card-columns">
      @foreach($memos as $memo)
      <div class="card memos_corner">
        <div class="card-body">
          <h5 class="card-title">{{ $memo->memo_title }}</h5>
          <p class="card-text">{{ $memo->memo_text }}</p>
          <a href="{{ url('memos', $memo->id) }}" class="btn btn-outline-dark btn-sm">メモを表示する</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-2"></div>
</div>


  @endsection