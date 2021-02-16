<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:255',
            'nickname' => 'required|string|min:5|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'class' => 'required|string',
            'roles_id' => 'required|integer|exists:roles,id'
        ];
    }
}
