<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ticket_mensajes', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('mensaje');
        //     $table->string('cliente')->nullable();
        //     $table->string('maker_id');
        //     $table->integer('ticket_id')->unsigned()->nullable();

        //     $table->timestamps();

        //     $table->foreign('ticket_id')->references('id')->on('tickets')
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
        // Schema::dropIfExists('ticket_mensajes');
    }
}
