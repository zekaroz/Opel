<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Shop extends Model
{
    //
    protected $fillable =  [
        'name',
        'shopDescription',
        'contactNumber',
        'location',
        'email',
        'OpeningDate'
    ];
    
    /*
     *Array of the atributes from this object
     * that are to be treated as an 
     * instance of carbon.
     *       */
    protected $dates =  ['OpeningDate']; 
    
    
    
    public function scopeEmailFilled($query){
        $query->where('email', '!=' , '');
    }
    
    public function setOpeningDateAttribute($date)
    {
        $this->attributes['OpeningDate'] = Carbon\Carbon::parse($date);
    }
    
    public function user(){
        
        return $this->belongsTo('App\User');
    }
    
     
}
