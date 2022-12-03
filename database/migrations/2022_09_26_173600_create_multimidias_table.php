<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimidias', function (Blueprint $table) {
            $table->id();
            $table->string('modelo')->nullable();
            $table->string('urlYoutube')->nullable();
            $table->string('titulo')->nullable();
            $table->longText('texto')->nullable();
            $table->string('cartola')->nullable();
            $table->string('imagem0')->nullable();
            $table->string('imagem1')->nullable();
            $table->string('imagem2')->nullable();
            $table->string('imagem3')->nullable();
            $table->string('imagem4')->nullable();
            $table->string('imagem5')->nullable();
            $table->string('imagem6')->nullable();
            $table->string('imagem7')->nullable();
            $table->string('imagem8')->nullable();
            $table->string('imagem9')->nullable();
            $table->string('imagem10')->nullable();
            $table->string('imagem11')->nullable();
            $table->string('imagem12')->nullable();
            $table->string('imagem13')->nullable();
            $table->string('imagem14')->nullable();
            $table->string('imagem15')->nullable();
            $table->string('imagem16')->nullable();
            $table->string('imagem17')->nullable();
            $table->string('imagem18')->nullable();
            $table->string('imagem19')->nullable();
            $table->string('legenda0')->nullable();
            $table->string('legenda1')->nullable();
            $table->string('legenda2')->nullable();
            $table->string('legenda3')->nullable();
            $table->string('legenda4')->nullable();
            $table->string('legenda5')->nullable();
            $table->string('legenda6')->nullable();
            $table->string('legenda7')->nullable();
            $table->string('legenda8')->nullable();
            $table->string('legenda9')->nullable();
            $table->string('legenda10')->nullable();
            $table->string('legenda11')->nullable();
            $table->string('legenda12')->nullable();
            $table->string('legenda13')->nullable();
            $table->string('legenda14')->nullable();
            $table->string('legenda15')->nullable();
            $table->string('legenda16')->nullable();
            $table->string('legenda17')->nullable();
            $table->string('legenda18')->nullable();
            $table->string('legenda19')->nullable();
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
        Schema::dropIfExists('multimidias');
    }
}