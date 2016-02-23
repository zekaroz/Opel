<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleType extends Model
{
    use SoftDeletes;
    
    protected $fillable =  [
        'name',
        'code'];
      
    public function articles(){
        return $this->hasMany('App\Article', 'article_type_id', 'id');
    }
}
