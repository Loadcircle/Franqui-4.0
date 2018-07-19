<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //      Schema::create('empresa_servicio', function (Blueprint $table) {
    //          $table->increments('id');

    //          $table->integer('empresa_id')->unsigned();
    //          $table->integer('servicio_id')->unsigned();
            
    //          $table->timestamps();
            
    //          $table->foreign('empresa_id')->references('id')->on('empresas')
    //          ->onDelete('cascade')
    //          ->onUpdate('cascade');

    //      $table->foreign('servicio_id')->references('id')->on('servicios')
    //          ->onDelete('cascade')
    //          ->onUpdate('cascade');
    //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('empresa_servicio');
    }
}
