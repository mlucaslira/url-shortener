<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShortUrlRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'original_url' => [
                'required',
                'string',
                'url',
            ],

            'short_code' => [
                'nullable',
                'string',
                'alpha_dash',
                'max:30',
            ],
            'title' => [
                'nullable',
                'string',
                'max:122',
            ],
            'description' => [
                'nullable',
                'string',
                'max:500',
            ],
            'redirect_delay' => [
                'nullable',
                'integer',
                'min:0',
                'max:10',
            ],
            'expires_at' => [
                'nullable',
                'date'
            ],
        ];
    }
}
