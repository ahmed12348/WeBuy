<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->method()=='PUT'){

            return [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'language_id' => 'required|exists:languages,id',

            ];
        }else{
            return [
                'name' => 'required|string|max:100',
//                'img' => 'required_without:id|mimes:jpg,jpeg,png',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'language_id' => 'required|exists:languages,id',
//                'password' => 'required_without:id',
            ];
        }

    }

    public function messages()
    {
        return [
            'img.required_without' => 'الصورة  مطلوب',
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة ',
            'email.email' => 'البريد الالكتوني غير صحيح',
            'string' => 'هذا الحقل لابد ان يكون احرف ',
            'name.string' => ' الاسم لابد ان يكون احرف ',
            'max' => 'هذا الحقل طويل ',
            'language_id.exists' => 'اللغة غير موجود ',
            'email.unique' => 'هذا الايميل مستخدم من قبل ',
        ];
    }
}
