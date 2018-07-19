<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('empresas', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('name');
        //     $table->string('razon_social');
        //     $table->string('logo')->nullable;
        //     $table->string('maker_id')->nullable();
        //     $table->integer('status')->default('1');

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
        // Schema::dropIfExists('empresa');
    }
}
