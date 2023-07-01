<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('foto-subir',function($cuenta){
            return $cuenta->perfil_id->nombre == 'Usuario';
        });
        Gate::define('foto-modificar',function($cuenta){
            return $cuenta->perfil_id->nombre == 'Usuario';
        });
        Gate::define('foto-borrar',function($cuenta){
            return $cuenta->perfil_id->nombre == 'Usuario';
        });
        Gate::define('fotos-baneadas',function($cuenta){
            return $cuenta->perfil_id->nombre == 'usuario';
        });
    }
}
