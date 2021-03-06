<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name'=>'required|max:200',
            'description'=>'required|max:500',
            'neto'=>'required',
            'iva'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png,jpg,ico,JPEG,JPG,BMP,PNG,ICO',
            'stock'=>'required|numeric',
            'categoria'=>'required|numeric',
            'status_product'=>'max:1'
        ];
    }
}
