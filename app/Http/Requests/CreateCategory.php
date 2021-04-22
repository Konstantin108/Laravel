<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
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
            'title' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string', 'min:2'],
            'is_visible' => ['required', 'string', 'min:1']
        ];
    }

    public function messages()
    {
        return [
          'required' =>   'Поле :attribute обязательно для заполнения.'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'наименование',
            'description' => 'описание'
        ];
    }
}
