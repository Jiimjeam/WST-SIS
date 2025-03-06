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
            'grades' => 'numeric|min:0|max:100',
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