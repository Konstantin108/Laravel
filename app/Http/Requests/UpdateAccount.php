<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccount extends FormRequest
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
            'id' => ['required', 'int', 'min:1'],
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'string', 'min:1'],
            'email_verified_at' => ['sometimes', 'string', 'min:1'],
            'password' => ['required', 'string', 'min:1'],
            'remember_token' => ['sometimes', 'string', 'min:1'],
            'created_at' => ['required', 'min:1'],
            'updated_at' => ['required', 'min:1'],
//            'is_admin' => ['boolean'],
            'last_login' => ['sometimes', 'min:1'],
            'avatar' => ['sometimes']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Поле :attribute обязательно для заполнения.',
            'min' => [
                'numeric' => 'Обязательно укажите :attribute'
            ],
            'integer' => 'Обязательно укажите :attribute',
            'string' => 'Поле :attribute должно быть строчного формата.',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'идентификатор',
            'name' => 'имя пользователя',
            'email' => 'E-Mail адрес',
            'email_verified_at' => 'дата верификации email адреса',
            'password' => 'пароль',
            'remember_token' => 'remember token',
            'created_at' => 'дата регистрации',
            'updated_at' => 'дата последнего обновления',
            'is_admin' => 'права администратора',
            'last_login' => 'последний раз в сети',
            'avatar' => 'аватар'
        ];
    }
}
