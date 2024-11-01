<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'DNI' => 'required|string|max:20|unique:clientes,DNI,' . $this->route('cliente')->id,
            'telefono' => 'required|integer|digits_between:8,15|unique:clientes,telefono,' . $this->route('cliente')->id,
            'correo' => 'required|string|max:150|unique:clientes,correo,' . $this->route('cliente')->id,
        ];
    }
}
