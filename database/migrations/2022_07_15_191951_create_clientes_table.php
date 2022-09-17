<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('direccion', 80);
            $table->string('telefono', 8);
            $table->string('cedula', 16);

            $table->unsignedBigInteger('cobrador_id')->nullable();
            $table->foreign('cobrador_id')->references('id')->on('cobradors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
