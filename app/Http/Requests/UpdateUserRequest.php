<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'sometimes|nullable|unique:users,email,'.$request->id,
            'password' => 'sometimes|nullable|string|min:6',      
            'photo' => 'sometimes|nullable|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'gender' => 'required',
            'mobile_num' => 'sometimes|nullable|unique:users,mobile_num,'.$request->id,


        ];
    }
}
