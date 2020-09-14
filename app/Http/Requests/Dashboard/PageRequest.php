<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            "name" => "required|string|max:100|min:2|" . Rule::unique('pages', 'name')->ignore($this->page),
            "meta_keywords" => "sometimes|nullable|string|max:100",
            "meta_description" => "sometimes|nullable|string|max:500",
            "description" => "required|string|min:10|max:500",
        ];
    }
}
