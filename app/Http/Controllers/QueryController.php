<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\BrandModel;


class QueryController extends Controller
{
      // route for API to get the list of models to feed the combobox
      public function getModelsByBrand(){
          $brand_id = Input::get('brand_id');

          $modelsList =  BrandModel::where('brand_id', $brand_id)->get();

          $html = '<option value="all">(all)</option>';
          foreach ($modelsList as $model) {
            $html = $html.'<option value="'.$model->id.'">'.$model->name.'</option>';
          }

          return $html;
      }

}
