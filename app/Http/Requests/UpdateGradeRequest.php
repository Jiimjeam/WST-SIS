<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users or modify logic as needed
    }

    public function rules(): array
{
    return [
        'grades' => [
            'required',
            'in:1.0,1.25,1.5,1.75,2.0,2.25,2.5,2.75,3.0,3.25,3.5,3.75,4.0,4.25,4.5,4.75,5.0'
        ],
    ];
}


    public function messages()
    {
        return [
            'grades.numeric' => 'The grade must be a number.',
            'grades.min' => 'The grade cannot be less than 0.',
            'grades.max' => 'The grade cannot be more than 100.',
        ];
    }
}