<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verificar', function(Blueprint $table){
        $table->bigIncrements('ID');
        $table->string('ip');
        $table->string('user');
        $table->string('accion');
        $table->date('fecha');
        $table->time('hora')->nullable();
        $table->string('navegador');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
