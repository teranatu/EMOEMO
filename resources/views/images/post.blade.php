

<!-- image_upload -->

<div class="row">

      <!-- 1st -->

      <div class="col-3">
        <div class="card">
          <label for="image1" class="">1枚目</label>
          <input type="file" name="image_name1" >
            @if ($errors->has('image1'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('image1') }}</strong>
            </span>
            @endif
        </div>
      </div>


      <!-- 2nd -->

      <div class="col-3">
        <div class="card">
          <label for="image2" class="">2枚目</label>
          <input type="file" name="image_name2" >
            @if ($errors->has('image2'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('image2') }}</strong>
            </span>
            @endif
        </div>
      </div>


      <!-- 3th -->

      <div class="col-3">
        <div class="card">
          <label for="image3" class="">3枚目</label>
          <input type="file" name="image_name3" >
            @if ($errors->has('image3'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('image3') }}</strong>
            </span>
            @endif
        </div>
      </div>


      <!-- 4th -->

      <div class="col-3">
        <div class="card">
          <label for="image4" class="">4枚目</label>
          <input type="file" name="image_name4" >
            @if ($errors->has('image4'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('image4') }}</strong>
            </span>
            @endif
        </div>
      </div>

</div>