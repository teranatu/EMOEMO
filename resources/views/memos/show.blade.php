@extends('layout')

@section('content')
  <h1>{{ $memo->memo_title }}</h1>

  <hr/>

  <article>
    <div class="memo_text">{{ $memo->memo_text }}</div>
  </article>
  
@endsection