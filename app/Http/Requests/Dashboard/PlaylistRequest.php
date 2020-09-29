<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlaylistRequest extends FormRequest
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
        $rules =  [
            "name" => "required|string|max:100|min:2|" . Rule::unique('videos', 'name')->ignore($this->video),
            "meta_keywords" => "sometimes|nullable|string|max:100",
            "meta_description" => "sometimes|nullable|string|max:500",
            "description" => "required|string|min:10|max:500",
            "category_id" => "required|integer",
            "image" => "required|image|mimes:png,jpg,jpeg|",

            "skills" => "sometimes|nullable|array",
            "skills.*" => "exists:skills,id",

            "tags" => "sometimes|nullable|array",
            "tags.*" => "exists:tags,id",
        ];


         if (in_array($this->getMethod(), ['PUT', 'PATCH'])) {
             $rules['image'] = "sometimes|nullable|image|mimes:png,jpg,jpeg";
         }

        return $rules;
    }


    public function attributes()
    {
        return [
            'category_id' => 'category',
            'skills.*' => 'skill',
            'tags.*' => 'tag',
        ];
    }
}
