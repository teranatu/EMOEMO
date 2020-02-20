@extends('layouts.app')

@section('content')
<div class="memos_header"></div>
@include('errors.alert')

  <h1 class="text-center">Memos</h1>

<!-- details card section starts from here -->
<div class="row">
  <div class="col-2"></div>
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