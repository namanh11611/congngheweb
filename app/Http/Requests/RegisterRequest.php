<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'txtUser' => 'required |unique:users,username',
        'txtPass' => 'required',
        'txtRePass' => 'required|same:txtPass',
        'txtEmail' => 'required',
        'txtFirstName' => 'required',
        'txtLastName' => 'required',
        'txtPhoneNumber' => 'required',
        'txtAddress' => 'required'
        ];
    }

    public function messages() {
        return [
            'txtUser.required' => 'Please Enter Username',
            'txtUser.unique' => 'User Is Exists',
            'txtPass.required' => 'Please Enter Password',
            'txtRePass.required' => 'Please Enter Password',
            'txtRePass.same' => 'Two Pass Dont Match',
            'txtEmail.required' => 'Please Enter Your Email',
            'txtFirstName.required' => 'Please Enter FirstName',
            'txtLastName.required' => 'Please Enter LastName',
            'txtRePass.required' => 'Please Enter Password',
            'txtPhoneNumber.required' => 'Please Enter Phone Number',
            'txtAddress.required' => 'Please Enter Address'
        ];
    }
}
