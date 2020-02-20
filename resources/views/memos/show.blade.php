@extends('layouts.app')

@section('content')
<div class="memos_header"></div>
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  

<div class="row">
  <div class="col-2">

    <div class="">
      <a href="{{ route('tweet', $memo->id) }}">
      <input class="btn btn-primary" type="submit" value="tweet">
      </a>
    </div>
    <div class="d-block">
      <a href="{{ action('MemosController@edit', [$memo->id]) }}">
      <input class="btn btn-primary" type="submit" value="編集">
      </a>
    </div>
    <form method="POST" action="{{ route('memos.destroy', [$memo->id]) }}" accept-charset="UTF-8" class="d-inline">
      <input name="_method" type="hidden" value="DELETE">
      <input type="submit" value="削除" class="btn btn-danger">
      @csrf
    </form>
    <div class="d-inline">
      <a href="{{ route('memos.index') }}">
      <input class="btn btn-primary" type="submit" value="戻る">
      </a>
    </div>
  </div>

  <div class="col-8 card">
    <h1>{{ $memo->memo_title }}</h1>
    <hr>
    <div class="memo_text">{{ $memo->memo_text }}</div>
    <?php $i = 0; ?>
    <div class="row">
    @foreach($images as $image)
    <?php $i++;?>
    <div class="col-3">
        <label for="image" class="mt-5">画像<?php echo $i ?></label>
        <img src="{{ $image->image_name }}" class="img-thumbnail w-100 h-50">
        @if ($errors->has('logo'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('logo') }}</strong>
        </span>
        @endif
    </div>
  @endforeach
    </div>
  </div>

  <div class="col-2"></div>
</div>

@endsection