<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Usuario');
        });

        User::create([
           "nombre" => 'Administrador',
            "email" => 'admin@admin.com',
            "password" => \Hash::make('123456789'),
        ])->assignRole('Admin');

        User::create([
            "nombre" => 'Agente',
            "email" => 'agente@agente.com',
            "password" => \Hash::make('123456789'),
        ])->assignRole('Agente');

        User::create([
            "nombre" => 'Usuario',
            "email" => 'usuario@usuario.com',
            "password" => \Hash::make('123456789'),
        ])->assignRole('Usuario');

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
