<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderOutRequest extends FormRequest
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
            'sltPostOffice' => 'required|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'sltPostOffice.required' => 'Please Choose Post Office',
            'sltPostOffice.not_in' => 'Please Choose Post Office'
        ];
    }
}
