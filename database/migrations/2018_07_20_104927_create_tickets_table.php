<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tickets', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('ticket')->unique();
        //     $table->string('asunto');
        //     $table->string('status');
        //     $table->string('maker_id');
        //     $table->integer('empresa_id')->unsigned()->nullable();

        //     $table->timestamps();

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
        // Schema::dropIfExists('tickets');
    }
}
