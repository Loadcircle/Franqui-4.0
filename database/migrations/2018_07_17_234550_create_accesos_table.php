<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('accesos', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('user_id')->unsigned();
        //     $table->string('ip')->nullable();

        //     $table->timestamps();
            
        //     //references
        //     $table->foreign('user_id')->references('id')->on('users')
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
        // Schema::dropIfExists('accesos');
    }
}
