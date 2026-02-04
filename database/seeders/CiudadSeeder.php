<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fichero = fopen(Storage::path('municipios.csv'), 'r');
        while (($datos=fgetcsv($fichero))!=null) {
            Ciudad::create([
                "cod_ciudad" => $datos[0],
                "nombre" => $datos[1],
                "cod_provincia" => $datos[2],
            ]);
        }
    }
}
