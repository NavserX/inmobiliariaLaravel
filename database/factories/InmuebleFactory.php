<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inmueble>
 */
class InmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "numcat"=>$this->faker->numeroCatastral(),
            "direccion"=>$this->faker->streetName(),
            "numero"=>$this->faker->buildingNumber(),
            "bloque"=>$this->faker->randomLetter(),
            "piso"=>$this->faker->numberBetween(1,25),
            "puerta"=>$this->faker->randomLetter(),
            "cod_ciudad"=>Ciudad::obtenerCodCiudadAleatorio(),
            "propietario_id"=>Propietario::factory()->create(),
        ];
    }
}
