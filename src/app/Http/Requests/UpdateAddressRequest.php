<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'postal_code' => 'nullable|string|min:8|max:9',
            'address' => 'nullable|string|min:3|max:250',
            'number' => 'nullable|string|min:1|max:50',
            'neighborhood' => 'nullable|string|min:3|max:250',
            'city' => 'nullable|string|min:3|max:250',
            'state' => 'nullable|string|min:2|max:2',
            'complement' => ['nullable'],
        ];
    }
}
