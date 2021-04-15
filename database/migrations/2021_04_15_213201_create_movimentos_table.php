<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_conta')->unsigned()->index();
            $table->string('tipo');
            $table->decimal('valor', 12,2);
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('movimentos', function (Blueprint $table) {
            $table->foreign('id_conta')->references('id')->on('contas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentos');
    }
}