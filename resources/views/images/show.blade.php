

<!-- unloaded image show -->

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