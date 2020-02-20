@extends('layouts.app')

@section('content')

  <h1>メモ新規作成画面</h1>

  <hr/>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
<form method="POST" action="{{ route('memos.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
  @CSRF
    <div class="form-group">
      <label for="memo_title">メモ名</label>
      <input class="form-control" name="memo_title" type="text" id="memo_title">
    </div>
    <div class="form-group">
      <label for="memo_text">メモ内容※こちらがツイートされます！</label>
      <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text"></textarea>
    </div>
    

    <div class="row">
      @for ($i =1; $i <5; $i++)

      <div class="col-3">
        <div class="card ">
          <label for="image{{ $i }}" class="">{{ $i }}枚目
          </label>
          <input type="file" name="image_name{{ $i }}" >
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