<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradesRequest extends FormRequest
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
            // Arabic "Name"
            'Name' => 'required|unique:grades,name->ar,'.$this->id,
            // English "Name"
            'Name_en' => 'required|unique:grades,name->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            // Arabic "Name"
            'Name.required' => trans('validation.required'),
            'Name.unique' => trans('validation.unique'),
            // English "Name"
            'Name_en.required' => trans('validation.required'),
            'Name_en.unique' => trans('validation.unique'),
        ];
    }
}
