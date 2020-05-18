<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Product_Image()
    {
      return $this->hasMany(Product_Image::class);
    }
}
