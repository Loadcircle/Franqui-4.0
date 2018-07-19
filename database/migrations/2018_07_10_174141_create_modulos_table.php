<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('modulos', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('name');
        //     $table->string('slug')->unique();
        //     $table->integer('padre_id')->unsigned()->nullable();
        //     $table->integer('servicio_id')->unsigned()->nullable();
        //     $table->string('maker_id')->nullable();
        //     $table->integer('status')->default('1');

        //     $table->timestamps();
            
        //     //relation
        //     $table->foreign('servicio_id')->references('id')->on('servicios')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        
        // });
        // Schema::table('modulos', function (Blueprint $table) {

        //     $table->foreign('padre_id')->references('id')->on('modulos')
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
        // Schema::dropIfExists('modulos');
    }
}
