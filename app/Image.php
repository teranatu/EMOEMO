<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function memo()
    {
    return $this->belongsTo('App\Memo');
    }
}
