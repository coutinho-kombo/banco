<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_modo')->unsigned()->index();
            $table->string('servico')->unique();
            $table->decimal('valor', 12,2);
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('servicos', function (Blueprint $table) {
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
        Schema::dropIfExists('servicos');
    }
}