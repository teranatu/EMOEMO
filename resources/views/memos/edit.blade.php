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
    
  {!! Form::close() !!}
  
@endsection('content')