<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('herramientas', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('name');
        //     $table->string('slug')->unique();
        //     $table->integer('servicio_id')->unsigned()->nullable();
        //     $table->string('maker_id')->nullable();
        //     $table->integer('status')->default('1');
    
        //     $table->timestamps();
                
        //     //relation
        //     $table->foreign('servicio_id')->references('id')->on('servicios')
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
        // Schema::dropIfExists('herramientas');
    }
}
