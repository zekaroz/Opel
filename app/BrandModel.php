<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandModel extends Model
{
    use SoftDeletes;
    
    protected $fillable =  [
        'name',
        'code',
        'brand_id'];

    public function articles(){
        return $this->hasMany('App\Article', 'model_id', 'id');
    }
    
    public function pictures(){
        return $this->hasMany('App\Article', 'model_id', 'id');
    }    
}
