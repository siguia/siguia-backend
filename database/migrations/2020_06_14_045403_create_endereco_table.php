<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cidade', 65)->nullable()->default(null);
            $table->string('bairro', 65)->nullable()->default(null);
            $table->string('estado', 65)->nullable()->default(null);
            $table->string('rua', 65)->nullable()->default(null);
            $table->string('numero', 5)->nullable()->default(null);
            $table->point('localizacao');
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
        Schema::dropIfExists('endereco');
    }
}
