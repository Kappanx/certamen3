<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'perfiles';
    protected $primaryKey = 'id';
    public $timeStamps = false;

    public function cuentas():HasMany
    {
        return $this->hasMany(Cuenta::class);
    }
}