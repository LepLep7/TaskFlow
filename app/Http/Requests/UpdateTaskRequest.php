<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('task')->user_id === $this->user()->id;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date'],
            'status' => ['required', 'in:pending,completed'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sila masukkan tajuk task.',
            'status.in' => 'Status mesti pending atau completed sahaja.',
        ];
    }
}