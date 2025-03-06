<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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

        $subjectId = $this->route('subject');

        return [
            'name' => 'required',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subjectId,
            'units' => 'required|integer|min:1',
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'name' => strip_tags($this->name),
            'code' => strip_tags($this->code),
            'units' => strip_tags($this->units),
        ]);
    }
}
