<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'titulo'=>'required|max:200',
            'articulo'=>'required|max:2000',
            'imagen'=>'mimes:jpeg,bmp,png,jpg,ico,JPEG,JPG,BMP,PNG,ICO',
            'categoria'=>'required',
            'inicio'=>'required|max:2',
        ];
    }
}
