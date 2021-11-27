<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dep_name' => 'required|string|min:3',
            'keyword' => 'required|string|min:3',
            'admin_id' => 'sometimes|nullable|numeric',

        ];
    }
}
