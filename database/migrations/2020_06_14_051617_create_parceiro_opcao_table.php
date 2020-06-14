<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceiroOpcaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiro_opcao', function (Blueprint $table) {
            $table->integer('opcao_id')->unsigned();
            $table->integer('parceiro_id')->unsigned();

            $table->foreign('opcao_id')->references('id')->on('opcao');
            $table->foreign('parceiro_id')->references('id')->on('parceiro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parceiro_opcao');
    }
}
