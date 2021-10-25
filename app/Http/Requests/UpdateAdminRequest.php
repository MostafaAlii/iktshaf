<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.$request->id,
            'password' => 'sometimes|nullable|min:6',      
            'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'status' => 'required',
            'phone' => 'sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'bio' => 'sometimes|nullable|string',
        ];
    }
}
