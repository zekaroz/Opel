<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticlesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required', 
         // 'model_id' => 'required',
            'brand_id' => 'required',
            'part_type_id' => 'required'
        ];
    }
}