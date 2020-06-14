<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->text('observacao')->nullable()->default(null);
            $table->boolean('confirmado')->nullable();

            $table->integer('parceiro_id')->unsigned();
            $table->integer('motorista_id')->unsigned();

            $table->foreign('parceiro_id')->references('id')->on('parceiro');
            $table->foreign('motorista_id')->references('id')->on('motorista');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamento');
    }
}
