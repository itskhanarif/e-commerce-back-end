<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  public function user()
  {
    return $this->hasOne(User::class);
  }
}
