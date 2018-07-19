<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('herramienta_documentos', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('herramienta_id')->unsigned();
        //     $table->integer('documento_id')->unsigned();
        //     $table->integer('empresa_id')->unsigned()->nullable();
        //     $table->integer('status')->default('1');

        //     $table->timestamps();

        //     //references
        //     $table->foreign('herramienta_id')->references('id')->on('herramientas')
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
        // Schema::dropIfExists('herramienta_documentos');
    }
}
