<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Tentukan sama ada user dibenarkan buat request ni.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules untuk validate data yang masuk.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date', 'after:today'],
        ];
    }

    /**
     * Mesej error custom (senangkan user faham).
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Please enter a task title.',
            'title.max' => 'Task title must not exceed 255 characters.',
            'due_date.after' => 'Due date must be a future date.',
        ];
    }
}