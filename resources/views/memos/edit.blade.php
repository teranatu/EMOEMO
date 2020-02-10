@extends('layout')

@section('content')
  <h1>Edit: {{ $memo->memo_title }}</h1>

  <hr/>

  @include('errors.form_errors')
  
  {!! Form::model($memo, ['method' => 'PATCH', 'url' => ['memos', $memo->id]]) !!}
    <div class="form-group">
      {!! Form::label('memo_title', 'Title:') !!}
      {!! Form::text('memo_title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('memo_text', 'Text:') !!}
      {!! Form::textarea('memo_text', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Add Memo', ['class' => 'btn btn-primary form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection('content')