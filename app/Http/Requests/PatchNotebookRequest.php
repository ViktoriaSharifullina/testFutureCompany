<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchNotebookRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'integer', 'gt:0'],
            'full_name' => ['sometimes', 'required', 'string'],
            'company' => ['sometimes', 'required', 'string'],
            'phone' => ['sometimes', 'required', 'numeric'],
            'email' => ['sometimes', 'required', 'email'],
            'birth_date' => ['sometimes', 'nullable', 'date'],
            'photo' => ['sometimes', 'nullable', 'string'],
            'created_at' => ['sometimes', 'date_format:Y-m-d'],
            'updated_at' => ['sometimes', 'date_format:Y-m-d'],
        ];
    }
}

