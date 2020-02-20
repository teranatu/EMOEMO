@extends('layout')

@section('content')

  <h1>メモ編集面: {{ $memo->memo_title }}</h1>

  <hr/>

<!-- if_errors_create_S  -->
  @include('errors.form_errors')
<!-- if_errors_create_E  -->

<!-- Edit_form-S -->

  <!-- post_form-S -->
    <form method="POST" action="{{ route('memos.update', [$memo->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
    @method('PATCH')
    @CSRF
  <!-- post_form-S -->

    <div class="form-group">
    <label for="memo_title">メモ名:</label>
    <input class="form-control" name="memo_title" type="text" id="memo_title" value="{{ $memo->memo_title }}">
    </div>
    <div class="form-group">
    <label for="memo_text">メモ内容:</label>
      <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text">{{ $memo->memo_text }}</textarea>
    </div>

  <!-- image_show-S -->
    @include('images.show')
  <!-- image_show-E -->

  <!-- image_upload-S -->
    @include('images.post')  
  <!-- image_upload-E -->

  <!-- submit_form-S -->
    <div class="form-group">
      {!! Form::submit('編集完了', ['class' => 'btn btn-primary form-control']) !!}
    </div>  
  <!-- submit_form-E -->

<!-- Edit_form-E -->

<!-- buttons -->
  <div class="d-inline">
    <a href="{{ route('memos.index') }}">
    <input class="btn btn-primary" type="submit" value="戻る">
    </a>
  </div>
<!-- buttons -->

@endsection('content')