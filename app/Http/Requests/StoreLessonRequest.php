<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'string|max:50',
            'lessons' => 'integer|min:1|max:10000',
            'promocion' => 'numeric|min:1|max:10000',
            'regular'=>'numeric|min:1|max:10000',
        ];
    }
}

