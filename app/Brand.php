<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
        use SoftDeletes;

      protected $fillable =  [
        'name',
        'code'
          ];

      protected $maps = [
        // implicit relation mapping:
        'name' => 'text'
      ];

     public function articles(){
        return $this->hasMany('App\Article', 'brand_id', 'id');
    }

     public function models(){
        return $this->hasMany('App\BrandModel', 'brand_id', 'id');
    }

    public function pictures(){
        return $this->belongsToMany('App\Fileentry', 'brand_images', 'brand_id', 'fileentry_id');
   }
}
