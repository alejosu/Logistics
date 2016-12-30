<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaViajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            
            $table->double('cantidad',8,2);
            $table->date('fecha_salida');
            $table->date('fecha_entrega');            
            $table->binary('Manifiesto');
            $table->integer('id_solicitud')->unsigned();
            $table->string('placa');
            $table->string('origen');
            $table->string('destino');
            $table->string('medida');
            $table->string('destinatario');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('id_solicitud')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
