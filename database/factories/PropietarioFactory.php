<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "dni"=>$this -> faker -> dni(),
            "nombre"=>$this-> faker -> name(),
            "apellidos"=>$this-> faker -> lastName(),
            "iban"=>$this-> faker -> iban(),
            "direccion"=>$this-> faker -> address(),
            "telefono"=>$this-> faker -> phoneNumber(),

        ];
    }
}
