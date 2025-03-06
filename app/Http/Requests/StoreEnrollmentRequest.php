<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Enrollment;



class StoreEnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrollment_date' => 'required|date',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->studentAlreadyEnrolled()) {
                $validator->errors()->add('student_id', 'This student is already enrolled in this subject.');
            }
        });
    }

    /**
     * Check if the student is already enrolled in the subject.
     */
    protected function studentAlreadyEnrolled()
    {
        return Enrollment::where('student_id', $this->student_id)
                         ->where('subject_id', $this->subject_id)
                         ->exists();
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'name' => strip_tags($this->name),
            'address' => strip_tags($this->address),
        ]);
    }
}
