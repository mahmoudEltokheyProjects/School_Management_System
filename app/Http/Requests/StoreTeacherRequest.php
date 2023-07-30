<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'Email' => 'required|unique:teachers' ,
            'Password' => 'required|unique:password|min:6' ,
            'Name' => 'string|max:20' ,


        ];
    }
    public function messages()
    {
        return[
            'Email.require' => 'Email inputfield is required',
            'Email.unique'  => 'Email inputfield must be unique' ,
            'Password.require' => 'Password inputfield is required' ,
            'Password.mix' => 'Password characters must be at least 6 characters',
        ];
    }
}
