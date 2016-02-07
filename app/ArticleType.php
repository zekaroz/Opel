<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
      protected $fillable =  [
        'name',
        'code'];
      
   public function articles(){
        return $this->hasMany('App\Article', 'article_type_id', 'id');
    }
}
