@extends('layout')

@section('content')

  <h1>Write a New memo</h1>

  <hr/>

@include('errors.alert')
  
<form method="POST" action="{{ route('memos.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
  @CSRF
    <div class="form-group">
      <label for="memo_title">Title:</label>
      <input class="form-control" name="memo_title" type="text" id="memo_title">
    </div>
    <div class="form-group">
      <label for="memo_text">Text:</label>
      <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text"></textarea>
    </div>
    
    <div class="form-group">
      @for ($i =1; $i <5; $i++)
      <div>
        <label for="image{{ $i }}" class="">画像{{ $i }}</label>
        <div>
          <input type="file" name="image_name{{ $i }}">
          @if ($errors->has('logo'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('logo') }}</strong>
          </span>
          @endif
        </div>
      </div>
      @endfor
    </div>
    
    <div class="form-group">
      {!! Form::submit('Add Memo', ['class' => 'btn btn-primary form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection('content')