<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Imagen extends Authenticable
{
    use HasFactory;

    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function cuenta():BelongsTo
    {
        return $this->belongsTo(Cuenta::class);
    }
}