@extends('layout')

@section('content')
  <h1>メモ編集面: {{ $memo->memo_title }}</h1>

  <hr/>

  @include('errors.form_errors')
  
  <form method="POST" action="{{ route('memos.update', [$memo->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
  @method('PATCH')
  @CSRF
    <div class="form-group">
    <label for="memo_title">メモ名:</label>
    <input class="form-control" name="memo_title" type="text" id="memo_title" value="{{ $memo->memo_title }}">
    
    </div>
    <div class="form-group">
    <label for="memo_text">メモ内容:</label>
      <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text">{{ $memo->memo_text }}</textarea>
    </div>
    <!-- image_veiw -->
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

  <!-- image_upload -->
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
      {!! Form::submit('編集完了', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="d-inline">
      <a href="{{ url('memos') }}">
      <input class="btn btn-primary" type="submit" value="戻る">
      </a>
    </div>
    
  {!! Form::close() !!}
  
@endsection('content')