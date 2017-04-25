<?php

namespace App\Http\Requests;
use App\Http\Requests\CustomerRequest;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'txtFirstName' => 'required',
            'txtLastName' => 'required',
            'txtPhoneNumber' => 'required',
            'txtAddress' => 'required'
        ];
    }

    public function messages() {
        return [
            'txtFirstName.required' => 'Please Enter FirstName',
            'txtLastName.required' => 'Please Enter LastName',
            'txtRePass.required' => 'Please Enter Password',
            'txtPhoneNumber.required' => 'Please Enter Phone Number',
            'txtAddress.required' => 'Please Enter Address'
        ];
    }
}
