<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropietarioRequest extends FormRequest
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
            "dni"=>'regex:^\d{8}[A-Z]{1}^|string|max:9',
            "nombre"=>'string|max:255',
            "apellidos"=>'string|max:255',
            "iban"=>'string|max:34',
            "direccion"=>'string|max:34',
            "telefono"=>'string|max:50'
        ];
    }
}
