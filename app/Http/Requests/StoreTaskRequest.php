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
            'title.required' => 'Sila masukkan tajuk task.',
            'title.max' => 'Tajuk task tidak boleh lebih 255 huruf.',
            'due_date.after' => 'Tarikh akhir kena tarikh masa depan.',
        ];
    }
}