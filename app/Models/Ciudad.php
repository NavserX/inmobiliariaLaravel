<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Ciudad extends Model
{
    protected $fillable = [
        "cod_ciudad",
        "nombre",
        "cod_provincia"
    ];

    protected $primaryKey = "cod_ciudad";

    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class, 'cod_ciudad', 'cod_ciudad');
    }

    public static function obtenerCodCiudadAleatorio():string{


        //$ciudad = Ciudad::inRandomOrder()->first();

        //return $ciudad->cod_ciudad;
        return DB::table('ciudads')->inRandomOrder()->first()->cod_ciudad;
    }
}
