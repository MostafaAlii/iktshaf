<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentFileCodeRequest extends FormRequest
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
            'attachment'    =>  'required|mimes:xlsx,xls',
        ];
    }
    public function messages()
    {
        return [

            'attachment.required' => 'يجب ارفاق ملف ﻻنه مطلوب',
            'attachment.mimes' => 'يجب ان تكون صيغه الملف المرفق xlsx او xls',

            ];
    }
}
