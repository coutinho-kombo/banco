<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_municipio')->unsigned()->index();
            $table->string('nome');
            $table->date('data_nascimento')->nullable();
            $table->string('genero');
            $table->text('foto')->nullable();
            $table->bigInteger('telefone');
            $table->timestamps();
        });

        Schema::table('pessoas', function (Blueprint $table) {
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}