<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo', 20);
            $table->string('archivo', 100);
            $table->boolean('baneada')->nullable();
            $table->text('motivo_ban')->nullable();
            $table->string('cuenta_user', 20)->index('imagenes_cuenta_user_foreighn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
};
