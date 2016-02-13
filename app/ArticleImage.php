<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
       public  $timestamps = false;
    
     protected $fillable =  [
        'article_id',
        'fileentry_id'];
}
