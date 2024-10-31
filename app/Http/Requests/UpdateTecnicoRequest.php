<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTecnicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>'required|string|max:30',
            'apellido'=>'required|string|max:30',
            'DNI'=>'required|string|max:20',
            'telefono' => 'required|integer|digits_between:8,15',
            'correo'=>'required|string|max:150',
        ];
    }
}
