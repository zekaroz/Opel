<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SiteContact;

class SiteContactController extends Controller
{
  public function markAsRead($id) {
      $siteContactMessage = SiteContact::findOrFail($id);

      $siteContactMessage->isSeen= true;

      $siteContactMessage->save();

      return \Response::json([
                         'error' => false,
                         'code'  => 200,
                         'feedback' =>'Message has been marked as seen.'
                     ], 200);
  }
}
