<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('agendas', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('lugar')->nullable();
        //     $table->string('asunto')->nullable();
        //     $table->text('comentario')->nullable();
        //     $table->date('dia');
        //     $table->time('inicio')->nullable();
        //     $table->time('fin')->nullable();
        //     $table->integer('asesor')->unsigned();
        //     $table->integer('cliente')->unsigned();
        //     $table->string('maker_id')->nullable();
        //     $table->integer('status')->default('1');

        //     //references
        //     $table->foreign('asesor')->references('id')->on('users')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');

        //     $table->foreign('cliente')->references('id')->on('users')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('agendas');
    }
}
