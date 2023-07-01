<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            ['user' => 'admin','password' => Hash::make('1234'),'nombre'=>'admin', 'apellido'=>'admin', 'perfil_id'=>1],           
            ['user' => 'juan','password' => Hash::make('1234'),'nombre'=>'juan', 'apellido'=>'perez', 'perfil_id'=>2],  
            ['user' => 'pablo','password' => Hash::make('1234'),'nombre'=>'pablo', 'apellido'=>'fuentes', 'perfil_id'=>2],
        ]);
    }
}
