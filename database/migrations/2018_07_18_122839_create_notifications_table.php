<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('notifications', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('documento_id')->unsigned()->nullable();
        //     $table->integer('agenda_id')->unsigned()->nullable();
        //     $table->integer('type')->default('1');
        //     $table->integer('section')->nullable();

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
        // Schema::dropIfExists('notifications');
    }
}
