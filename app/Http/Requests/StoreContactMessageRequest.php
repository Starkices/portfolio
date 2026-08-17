<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'subject' => [
                'required',
                'string',
                'min:3',
                'max:150',
            ],

            'message' => [
                'required',
                'string',
                'min:20',
                'max:2000',
            ],

            'website' => [
                'nullable',
                'max:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'website.max' =>
                'Spam detected.',

            'message.min' =>
                'Please provide a little more detail about your message.',
        ];
    }
}