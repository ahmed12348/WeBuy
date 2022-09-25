<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'mobile' => 'required|max:100|unique:vendors,mobile,'.$this->id,
            'email' => 'required|email|unique:vendors,email,'.$this->id,
            'category_id' => 'required|exists:main_categories,id',
            'address' => 'required|string|max:500',
            'password' => 'required_without:id',
//
        ];
    }

    public function messages()
    {
        return [

            'logo.required_without' => 'الصورة  مطلوب',
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة ',
            'email.email' => 'البريد الالكتوني غير صحيح',
            'string' => 'هذا الحقل لابد ان يكون احرف ',
            'name.string' => ' الاسم لابد ان يكون احرف ',
            'max' => 'هذا الحقل طويل ',
            'category_id.exists' => 'القسم غير موجود ',
            'address.string'=> ' العنوان لابد ان يكون احرف',
            'email.unique' => 'هذا الايميل مستخدم من قبل ',
            'mobile.unique' => 'هذا الهاتف مستخدم من قبل ',
        ];
    }
}
