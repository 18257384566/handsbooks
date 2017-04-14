<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'name' => 'required|min:3|unique:admins,name',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.min' => '用户名不能少于3位',
            'password.required' => '密码不能为空',
            'password.confirmed' => '密码不一致',
            'password_confirmation.required' => '确认密码不能为空',
            'name.unique' => '用户名已经被注册'
        ];
    }
}
