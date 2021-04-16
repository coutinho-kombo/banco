<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descontos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_modo')->unsigned()->index();
            $table->string('desconto')->unique();
            $table->decimal('preco', 12,2);
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('descontos', function (Blueprint $table) {
            $table->foreign('id_modo')->references('id')->on('modo_pagamentos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descontos');
    }
}