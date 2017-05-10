<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderInRequest extends FormRequest
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
            'txtOrderCode'       => 'required|unique:order_inputs,bill_code',
            'txtAmountPayed'     => 'required|min:0',
            'txtDateIn'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtOrderCode.required'             => "Please Enter Order Code",
            'txtAmountPayed.required'           => 'Please Enter Amount Payed',
            'txtDateIn.required'                => 'Please Enter Date Input',
            'txtOrderCode.unique'               => 'Order Code Is Exists'
        ];
    }
}
