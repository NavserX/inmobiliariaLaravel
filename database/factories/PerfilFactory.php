<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "metros"=>$this->faker->numberBetween(1,1000),
            "habitaciones"=>$this->faker->numberBetween(1,15),
            "banyos"=>$this->faker->numberBetween(1,15),
            "ascensor"=>$this->faker->boolean(),
            "tipo"=>$this->faker->randomElement(['piso','adosado','parcela','nave', 'industrial']),
            "eficiencia"=>$this->faker->randomElement(['A','B','C','E','F','G']),
            "anyo"=>$this->faker->year(),
        ];
    }
}
