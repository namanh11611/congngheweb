<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' => 'required',
            'txtName'   => 'required|unique:produtcs, name',
            'fImages'   => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'sltParent.required'    =>  'Please Choose Category',
            'txtName.required'      =>  'Please Enter Product Name',
            'txtName.unique'        =>  'Product Name Is Exist',
            'fImages.required'      =>  'Please Choose Images',
            'fImages.image'         =>  'This File Is Not Image'
        ];
    }
}
