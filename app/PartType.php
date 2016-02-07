<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    //
      protected $fillable =  [
        'name',
        'code'];
      
   public function articles(){
        return $this->hasMany('App\Article', 'part_type_id', 'id');
    }
}
