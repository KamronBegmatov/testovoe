<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidation;
use Illuminate\Foundation\Http\FormRequest;

class PerformTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
/*    public function authorize()
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|exists:users,phone', [new PhoneValidation],
            'username' => 'required|string|exists:users,username',
            'password' => 'required|min:8',
            'amount' => 'required|numeric|max:124500000|not_in:0',
            'service_id' => 'required|exists:services,id',
        ];
    }
}
