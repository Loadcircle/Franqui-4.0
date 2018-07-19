<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('modulo_documentos', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('modulo_id')->unsigned();
        //     $table->integer('documento_id')->unsigned();
        //     $table->integer('empresa_id')->unsigned()->nullable();
        //     $table->integer('status')->default('1');

        //     $table->timestamps();

        //     //references
        //     $table->foreign('modulo_id')->references('id')->on('modulos')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
            
        //     $table->foreign('documento_id')->references('id')->on('documentos')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
            
        //     $table->foreign('empresa_id')->references('id')->on('empresas')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('modulo_documentos');
    }
}
