<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
      protected $fillable =  [
        'name',
        'code'
          ];
      
     public function articles(){
        return $this->hasMany('App\Article', 'brand_id', 'id');
    }
    
     public function models(){
        return $this->hasMany('App\Model', 'brand_id', 'id');
    }
}
