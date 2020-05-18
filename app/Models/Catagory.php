<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\catagory_image;
use App\Models\Catagory;

class Catagory extends Model
{
  public function catagory_image()
  {
    return $this->hasMany(catagory_image::class);
  }
  public function parent()
  {
    return $this->BelongsTo(Catagory::class, 'parent_id');
  }
}
