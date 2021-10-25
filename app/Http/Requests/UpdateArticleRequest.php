<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'photo' => 'sometimes|nullable|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'admin_id' => 'required',
            'department_id' => 'required',
            'tags' => 'sometimes|nullable',

        ];
    }
}
