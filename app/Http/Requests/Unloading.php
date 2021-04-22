<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Unloading extends FormRequest
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
    public function rules(): Array
    {
        return [
            'firstname' => ['required', 'string', 'min:1'],
            'surname' => ['required', 'string', 'min:1'],
            'phone' => ['required', 'string', 'min:1'],
            'description' => ['required', 'string', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Поле :attribute обязательно для заполнения.',
        ];
    }

    public function attributes()
    {
        return [
            'firstname' => 'Имя заказчика',
            'surname' => 'Фамилия заказчика',
            'phone' => 'Номер телефона',
            'description' => 'Описание заказа'
        ];
    }
}
