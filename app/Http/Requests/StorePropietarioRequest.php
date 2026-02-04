<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropietarioRequest extends FormRequest
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
            "dni"=>'required|regex:^\d{8}[A-Z]{1}^|string|max:9',
            "nombre"=>'required|string|max:255',
            "apellidos"=>'required|string|max:255',
            "iban"=>'required|string|max:34',
            "direccion"=>'required|string|max:34',
            "telefono"=>'required|string|max:50'
        ];
    }
    public function messages()
    {
        return [
            "dni"=>"Hay un problemea en el campo DNI",
            "nombre.required"=>"El campo NOMBRE es un campo obligatorio",
            "nombre.max"=>"El campo NOMBRE no puede superar los 255 caracteres",
            "nombre.string"=>"El campo NOMBRE debe ser un texto"
        ];
    }
}
