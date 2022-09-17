<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->date('inicio');
            $table->string('tipo', 30);
            $table->string('operador', 30);
            $table->string('periodo', 20);
            $table->date('periodo_inicio');
            $table->date('periodo_fin');
            $table->string('equipo_instalado', 50);
            $table->string('mac', 50);
            $table->string('velocidad', 50);
            $table->string('nota', 50)->nullable();
            $table->float('monto')->nullable();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
