<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'alumn_DNI' => 'required|string|max:50|unique:students,alumn_DNI,'.$this->student->id, //no se que hace esto, pero si lo borras, rompes TODO!!!!
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'asistencias' => 'integer|min:0|max:10000',
            'fecha_nac' => 'required|date',
            'año' => 'required|in:primero,segundo,tercero',
        ];
    }
}