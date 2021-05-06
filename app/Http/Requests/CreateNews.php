<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNews extends FormRequest
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
        return[
            'category_id' => ['required', 'int', 'min:1'],
            'title' => ['required', 'string', 'min:2'],
            'slug' => ['required', 'string', 'min:2'],
            'image' => ['sometimes', 'image:jpg,jpeg,png'],
            'text' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Поле :attribute обязательно для заполнения.',
            'min' => [
                'numeric' => 'Обязательно укажите :attribute'
            ],
            'integer' => 'Обязательно укажите :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'категорию',
            'title' => 'наименование',
            'slug' => 'слаг',
            'text' => 'описание',
        ];
    }
}
