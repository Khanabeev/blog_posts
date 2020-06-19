<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
            'reply' => ['max:250','required']
        ];
    }

    public function messages()
    {
        return [
            'max' => 'The :attribute maximum length is 250 chars',
            'required' => 'The :attribute is require'
        ];
    }
}
