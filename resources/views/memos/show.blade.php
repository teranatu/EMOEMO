@extends('layout')

@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  
  <h1>メモ名:{{ $memo->memo_title }}</h1>

  <hr/>

  <article>
    <div>メモ内容</div>
    <div class="memo_text">{{ $memo->memo_text }}</div>
  </article>

  <hr/>

  <?php $i = 0; ?>
    <div class="row">
  @foreach($images as $image)
<?php $i++;?>
    <div class="col-3">
        <label for="image" class="">画像<?php echo $i ?></label>
        <img src="{{ $image->image_name }}" class="img-thumbnail w-100 h-50">
        @if ($errors->has('logo'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('logo') }}</strong>
        </span>
        @endif
    </div>
  @endforeach
    </div>

  <hr/>

  <div class="d-inline">
    <a href="{{ route('tweet', $memo->id) }}">
    <input class="btn btn-primary" type="submit" value="tweetする">
    </a>
  </div>


  <div class="d-inline">
    <a href="{{ action('MemosController@edit', [$memo->id]) }}">
    <input class="btn btn-primary" type="submit" value="編集">
    </a>
  </div>



  {!! delete_form(['memos', $memo->id]) !!}


  <div class="d-inline">
    <a href="{{ url('memos') }}">
    <input class="btn btn-primary" type="submit" value="戻る">
    </a>
  </div>
@endsection