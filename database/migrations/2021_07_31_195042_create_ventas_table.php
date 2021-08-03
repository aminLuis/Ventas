<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->bigInteger('idCliente');
            $table->string('numeroDocumento');
            $table->string('nombreCliente');
            $table->double('total');
            $table->string('hora');
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('idCliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
