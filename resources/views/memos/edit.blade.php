@extends('layouts.app')

@section('content')
<div class="memos_header sticky-top"></div>
@include('errors.alert')
@include('errors.form_errors')

<h1 class="text-center mt-4">{{ $memo->memo_title }}</h1>

<!-- Edit_form-S -->
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
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
    <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text" onkeyup="isCount(this)">{{ $memo->memo_text }}</textarea>
    <p id="textlength">0文字</p>
      <script>
        'use strict'

        function isCount(obj) {
          let value    = obj.value;
          let count    = 0;
          let halfSize = value.match(/[\da-zA-Z \r\n]/g);

          if(halfSize) {
            count = value.length - halfSize.length / 2
          } else {
            count = value.length;
          };

          document.getElementById('textlength').textContent = count + '文字';
        };
      </script>
    </div>

  <!-- image_show-S -->
    @include('images.show')
  <!-- image_show-E -->

  <!-- image_upload-S -->
    @include('images.post')
  <!-- image_upload-E -->

  <!-- submit_form-S -->
    <div class="form-group">
      {!! Form::submit('編集完了', ['class' => 'btn btn-primary color_btn_edit form-control']) !!}
    </div>
  <!-- submit_form-E -->

<!-- Edit_form-E -->


  </div>
  <div class="col-2"></div>
</div>
@endsection('content')