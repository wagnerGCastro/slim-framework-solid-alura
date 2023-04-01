<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'postal_code' => 'required|string|min:8|max:9',
            'address' => 'required|string|min:3|max:250',
            'number' => 'required|string|min:1|max:50',
            'neighborhood' => 'required|string|min:3|max:250',
            'city' => 'required|string|min:3|max:250',
            'state' => 'required|string|min:2|max:2',
            'complement' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
