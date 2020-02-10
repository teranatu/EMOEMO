@extends('layout')

@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  
  <h1>{{ $memo->memo_title }}</h1>

  <hr/>

  <article>
    <div class="memo_text">{{ $memo->memo_text }}</div>
  </article>

  <hr/>

  <div class="d-inline btn btn-danger">
    <a href="{{ action('MemosController@edit', [$memo->id]) }}">
      編集
    </a>
  </div>

  <hr/>

  {!! delete_form(['memos', $memo->id]) !!}


  <hr/>

  <div class="d-inline btn btn-danger">
  <a href="{{ url('memos') }}">
      戻る
    </a>
  </div>
@endsection