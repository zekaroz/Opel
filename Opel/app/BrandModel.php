<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
      protected $fillable =  [
        'name',
        'code',
        'brand_id'];

    public function articles(){
        return $this->hasMany('App\Article', 'model_id', 'id');
    }
}
