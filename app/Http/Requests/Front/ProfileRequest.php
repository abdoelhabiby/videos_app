<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "name" => "required|string|min:2|max:100",
            "email" => "required|email|" . Rule::unique('users','email')->ignore(user()),
            'image' => "sometimes|nullable|image|mimes:png,jpg,jpeg"
        ];
    }
}
