<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreStudentRequest extends FormRequest
{
    /* +++++++++++++++ authorize() +++++++++++++++ */
    public function authorize()
    {
        return true;
    }
    /* +++++++++++++++ rules() +++++++++++++++ */
    public function rules()
    {
        return
        [
            'name_ar'         => 'required' ,
            'name_en'         => 'required' ,
            'email'           => ['nullable', 'array'],
            'email.*'         => ['email'], // Validate each element of the "email" array as an email address
            'password'        => 'required|string|min:6|max:10',
            'gender_id'       => 'required',
            'nationalitie_id' => 'required',
            'blood_id'        => 'required',
            'Date_Birth'      => 'required|date|date_format:Y-d-m',
            'Grade_id'        => 'required' ,
            'Classroom_id'    => 'required' ,
            'section_id'      => 'required' ,
            'parent_id'       => 'required' ,
            'academic_year'   => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.*.email' => 'One or more of the email addresses is invalid.',
        ];
    }
}
