<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  public function Brand_Image()
  {
    return $this->hasMany(Brand_Image::class);
  }
}
