<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
      protected $fillable =  [
        'name',
        'code',
        'brand_id'];
}
