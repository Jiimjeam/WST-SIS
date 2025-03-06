<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users or add authorization logic
    }

    public function rules(): array
    {
        return [
            'grades' => 'numeric|min:0|max:100',
            'enrollment_id' => 'required|exists:enrollments,id',
        ];
    }

    public function messages()
    {
        return [
            'grades.numeric' => 'The grade must be a number.',
            'grades.min' => 'The grade cannot be less than 0.',
            'grades.max' => 'The grade cannot be more than 100.',
            'enrollment_id.required' => 'Enrollment ID is required.',
            'enrollment_id.exists' => 'The selected enrollment does not exist.',
        ];
    }
}