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
            //$table->id();
            $table->increments('id');
            $table->string('tipoDocumento');
            $table->string('numeroDocumento');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('ciudad');
            $table->string('latitud');
            $table->string('longitud');
            $table->timestamps();

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
