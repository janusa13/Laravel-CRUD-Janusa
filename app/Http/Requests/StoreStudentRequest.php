<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'alumn_DNI' => 'required|string|max:50|unique:products,code',
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'asistencias' => 'integer|min:0|max:10000',
            'fecha_nac' => 'required|date'
        ];
    }
}