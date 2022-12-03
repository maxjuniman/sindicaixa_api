<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('modelo')->nullable();
            $table->string('picture')->nullable();
            $table->string('posicaoImg')->nullable();
            $table->string('urlYoutube')->nullable();
            $table->string('audio')->nullable();
            $table->string('posicaoVideo')->nullable();
            $table->string('posicaoAudio')->nullable();
            $table->string('insta')->nullable();
            $table->string('face')->nullable();
            $table->string('titulo')->nullable();
            $table->string('cartola')->nullable();
            $table->string('chamada')->nullable();
            $table->string('fonte')->nullable();
            $table->string('email')->nullable();
            $table->longText('texto')->nullable();
            $table->string('color')->nullable();
            $table->string('colorDuplo')->nullable();
            $table->date('dataInicio')->nullable();
            $table->timeTz('horaInicio', $precision = 0);
            $table->date('dataFinal')->nullable();
            $table->timeTz('horaFinal', $precision = 0);
            $table->date('dataPublicacao')->nullable();
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
        Schema::dropIfExists('noticias');
    }
}