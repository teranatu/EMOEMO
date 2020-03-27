<!-- Modal -->
<form method="POST" action="{{ route('memos.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
  @CSRF
  <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="tweetbox_r modal-content">
        <div class="modal-header p-0">

          <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
            <span class="bigx ml-3" aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title m-0-a" id="exampleModalCenteredLabel">
            <label for="memo_title" class="mt-4 mr-2">メモ名</label>
            <input class="" name="memo_title" type="text" id="memo_title" value="{{ old('memo_title') }}">
          </h5>
        </div>
        <div class="modal-body">
          <label for="memo_text">メモ内容※こちらがツイートされます！</label>
          <textarea class="form-control" name="memo_text" cols="50" rows="10" id="memo_text" onkeyup="isCount(this)">{{ old('memo_text') }}</textarea>
          <p id="textlength pt-4">0文字</p>
        </div>
        <div class="modal-footer">

  <div class="container">
    <div class="row">
      @for ($i =1; $i <5; $i++)
        <label class="col-3 p-0">
          <!-- ▽見せる部分 -->
          <span class="filelabel" title="ファイルを選択">
            <img src="https://res.cloudinary.com/dsv09nxlz/image/upload/v1582193711/PROJECT_EMOEMO/EMOEMO_LP/%E5%86%99%E7%9C%9F%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B310_eyjelg.png" width="40" height="40" alt="＋画像">
          </span>
          <!-- ▽本来の選択フォームは隠す -->
          <input type="file"  id="filesend" name="image_name{{ $i }}">
        </label>
      @endfor
    </div>
  </div>


          <input class="btn btn-primary form-control" type="submit" value="保存する">
        </div>
      </div>
    </div>
  </div>
</div>
