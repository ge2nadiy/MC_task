<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'middle_name' => 'max:20',
            'selectedDepart' => 'filled',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Введите имя',
            'first_name.max' => 'Слишком длинное имя(превышает 20 символов)',
            'last_name.required' => 'Введите фамилию',
            'last_name.max' => 'Слишком длинная фамилия(превышает 20 символов)',
            'selectedDepart.filled' => 'Выберите хотя бы один отдел',
            'middle_name.max' => 'Слишком длинное отчество(превышает 20 символов)',
        ];
    }
}
