<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
{
    /*  +++++++++++++++++++++++ authorize() +++++++++++++++++++++++ */
    public function authorize()
    {
        return true;
    }
    // +++++++++++++++++++++++ rules() +++++++++++++++++++++++
    public function rules()
    {
        return
        [
            // "Name" with "All" Languages : Get "All Values" From "List_Classes" And select "Name"
            // Arabic "Class Name"
            'List_Classes.*.Name' => 'required' ,
            // English "Class Name"
            'List_Classes.*.Name_class_en' => 'required' ,
        ];
    }
    // +++++++++++++++++++++++ rules() +++++++++++++++++++++++
    public function messages()
    {
        return
        [
            // Get "All Values" From "List_Classes" And select "Name"
            // Arabic "Class Name"
            'Name.required' => trans('validation.required'),
            // English "Class Name"
            'Name_class_en.required' => trans('validation.required')
        ];
    }
}
