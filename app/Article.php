<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
      use SoftDeletes;
    /*
     * Shop id is no fillable because it must 
     * be given by the session user
     */
    protected $fillable =  [
        'name',
        'reference',
        'description',
        'price',
        'article_type_id',
        'part_type_id',
        'model_id',
        'brand_id'
        ];
    
    /*
     * Article is of one model of a brand
     */
    public function shop(){
        return $this->belongsTo('App\Shop',"shop_id");
    }
    
    public function articleType(){
        return $this->belongsTo('App\ArticleType',"article_type_id");
    }

    /*
     * Article has one brand
     */
    public function brand(){
        return $this->belongsTo('App\Brand',"brand_id");
    }
    
    /*
     * Article has one model from that brand
     */
   
    public function model(){
        return $this->belongsTo('App\BrandModel',"model_id");
    } 

    /*
     * Article has one Part Type. Categorization from the 
     */
    public function partType(){
        return $this->belongsTo('App\PartType',"part_type_id");
    }
    
    /*
     *One article can have many pictures
     *       */
    public function pictures(){
        return $this->belongsToMany('App\Fileentry', 'article_images', 'article_id', 'fileentry_id');
   } 
}
