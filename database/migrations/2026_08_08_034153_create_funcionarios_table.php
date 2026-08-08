<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('funcionarios', function (Blueprint $table) {
        $table->id();
        $table->string('cedula')->unique();
        $table->string('nombre');
        $table->string('apellido');
        $table->string('cargo');
        $table->string('telefono')->nullable();
        $table->string('estatus')->default('Activo');
        $table->timestamps();
    });
}
};
