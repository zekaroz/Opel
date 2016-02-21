<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartType extends Model
{
    use SoftDeletes;
   
    protected $fillable =  [
        'name',
        'code'];
      
    public function articles(){
        return $this->hasMany('App\Article', 'part_type_id', 'id');
    }
}
