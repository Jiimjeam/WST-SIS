<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:students,email|unique:users,email',
            'address' => 'required',
            'age' => 'required',
            'password' => 'required',
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'name' => strip_tags($this->name),
            'address' => strip_tags($this->address),
        ]);
    }
}
