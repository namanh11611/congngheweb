<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'txtProviderName'       => 'required|unique:providers,name_provider',
            'txtProviderAddress'    => 'required',
            'txtPhoneNumber'        => 'required|unique:providers,phone_number'
        ];
    }

    public function messages(){
        return [
            'txtProviderName.required'          => "Please Enter Provider Name",
            'txtProviderAddress.required'       => 'Please Enter Provider Address',
            'txtPhoneNumber.required'           => 'Please Enter Phone Number',
            'txtPhoneNumber.unique'             => 'Phone Number Is Exists',
            'txtProviderName.unique'            => 'Provider Name Is Exists'
        ];
    }
}
