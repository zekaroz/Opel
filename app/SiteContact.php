<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
  protected $fillable =  [
      'email',
      'name',
      'phone',
      'message',
      'subject'
      ];

  protected $table = 'site_contacts';


}
