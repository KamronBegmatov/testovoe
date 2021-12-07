<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetInformationRequest extends FormRequest
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
            'username' => 'required|string|exists:users,username',
            'password' => 'required|min:8',
            'service_id' => 'required|exists:services,id',
        ];
    }
}
