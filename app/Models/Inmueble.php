<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inmueble extends Model
{
    /** @use HasFactory<\Database\Factories\InmuebleFactory> */
    use HasFactory;


    public function ciudad():BelongsTo{
        return $this->belongsTo(Ciudad::class,'codigo', 'cod_ciudad');
    }

    public function propietario():BelongsTo{
        return $this->belongsTo(Propietario::class);
    }

    public function perfil():HasOne{
        return $this->hasOne(Perfil::class);
    }

    public function ofertas():BelongsToMany{
        return $this->belongsToMany(User::class)->withPivot(['precio', 'fecha_vencimiento'])->withTimestamps();
    }
}
