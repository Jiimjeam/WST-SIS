<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        $studentId = $this->route('id'); // Ensure this matches your route parameter

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email' . $studentId,
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'name' => strip_tags($this->name),
            'address' => strip_tags($this->address),
        ]);
    }
}
