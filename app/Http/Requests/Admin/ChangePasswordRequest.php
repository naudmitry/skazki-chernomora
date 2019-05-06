<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'Поле "пароль" является обязательным.',
            'password.min' => 'Минимальная длина пароля 6 символов.',
            'password_confirmation.same' => 'Пароль подтверждения не совпадает.',
        ];
    }
}
