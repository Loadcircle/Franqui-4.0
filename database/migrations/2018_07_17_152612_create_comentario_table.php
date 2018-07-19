<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('comentarios', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('comentario')->nullable();
        //     $table->integer('documento_id')->unsigned();

        //     $table->timestamps();

        //     $table->foreign('documento_id')->references('id')->on('documentos')
        //                 ->onDelete('cascade')
        //                 ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('comentario');
    }
}
