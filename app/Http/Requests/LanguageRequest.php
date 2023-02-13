<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'slogan' => 'required|string|max:10',
          //  'active' => 'required|in:1',

        ];
    }


    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة ',
            'title.string' => 'اسم اللغة لابد ان يكون احرف',
            'slogan.max' => 'هذا الحقل لابد الا يزيد عن 10 احرف ',
            'slogan.string' => 'هذا الحقل لابد ان يكون احرف ',
            'title.max' => 'اسم اللغة لابد الا يزيد عن 100 احرف ',
        ];
    }
}
