<div class="col-2"></div>

<div class="col-12 col-md-8 text-center text-md-right">


    <div class="d-inline p-0">
      <a href="{{ route('tweet', $memo->id) }}" class="btn btn-primary color_btn_twitter">
        tweet
      </a>
    </div>
    <div class="d-inline p-0">
      <a href="{{ action('MemosController@edit', [$memo->id]) }}">
      <input class="btn btn-primary color_btn" type="submit" value="編集">
      </a>
    </div>
    <div class="d-inline p-0">
      <a href="{{ route('memos.index') }}">
        <input class="btn btn-primary color_btn" type="submit" value="戻る">
      </a>
    </div>
    
    <form method="POST" action="{{ route('memos.destroy', [$memo->id]) }}" accept-charset="UTF-8" class="d-inline p-0">
      <input name="_method" type="hidden" value="DELETE">
      <input type="submit" value="削除" class="btn btn-danger color_btn_delete">
      @csrf
    </form>

  </div>
</div>

  <div class="col-2"></div>
