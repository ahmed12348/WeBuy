<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
        if($this->method()=='PUT'){

            return [

                'img' => 'image|mimes:jpg,jpeg,png|sometimes',
                'category.*.name' => 'sometimes|required|min:3|max:255',
                'category.*.description' => 'sometimes|required|min:5|max:255',
                'category.*.price' => 'required',
            ];
        }else{

            return [
                'img' => 'image|mimes:jpg,jpeg,png|sometimes',
                'category.*.name' => 'sometimes|required|min:3|max:255',
                'category.*.description' => 'sometimes|required|min:5|max:255',
                'category.*.price' => 'required',
            ];
        }

    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'accepted'=> '  هذا الحقل يجب ان يكون مفعل ',
            'name.string' => 'اسم اللغة لابد ان يكون احرف',
            'description.max' => 'هذا الحقل لابد الا يزيد عن 10 احرف ',
            'description.string' => 'هذا الحقل لابد ان يكون احرف ',
            'name.max' => 'اسم اللغة لابد الا يزيد عن 100 احرف ',
        ];
    }

}
