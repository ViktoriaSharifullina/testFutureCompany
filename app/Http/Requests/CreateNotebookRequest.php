<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNotebookRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string'],
            'company' => ['required', 'string'],
            'phone' => ['required', 'unique:notebooks','string'],
            'email' => ['required','email', 'unique:notebooks', 'email'],
            'birth_date' => ['nullable', 'date'],
            'photo' => ['nullable', 'string'],
        ];
    }
}

