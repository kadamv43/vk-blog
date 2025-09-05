<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }


    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required'
        ];
    }
}
