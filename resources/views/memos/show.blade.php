@extends('layouts.app')

@section('content')
<div class="memos_header sticky-top"></div>
@include('errors.alert')
@include('errors.form_errors')

<div class="row mt-5">
  <div class="col-2"></div>

  <div class="col-8 card">
    <h1 class="ml-3">{{ $memo->memo_title }}</h1>
    <hr class="p-0 m-0">
    <div class="memo_text mt-3 ml-3">{{ $memo->memo_text }}</div>
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

  @include('btn.show')

</div>
@endsection