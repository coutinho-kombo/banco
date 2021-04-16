<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->string('conta')->unique();
            $table->decimal('valor_existente', 12,2);
            $table->text('ficheiro_bilhete')->nullable();
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('contas', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}