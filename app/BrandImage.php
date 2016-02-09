<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    public  $timestamps = false;
    
     protected $fillable =  [
        'brand_id',
        'fileentry_id'];
     
    
}
