<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Cuenta extends Authenticable
{
    use HasFactory;

    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function perfil():BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }

    public function imagenes():HasMany
    {
        return $this->hasMany(Imagen::class);
    }
}
