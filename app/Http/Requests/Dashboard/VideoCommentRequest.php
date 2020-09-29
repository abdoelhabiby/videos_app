<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class VideoCommentRequest extends FormRequest
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
            "video_id" => 'required|integer|exists:videos,id',
            "user_id" => 'required|integer',
            "comment" => 'required|string|min:3|max:500',
        ];

        if(in_array($this->getMethod(),['PUT','PATCH'])){
            unset($rules['video_id']);
            unset($rules['user_id']);
        }

        return $rules;


    }
}
