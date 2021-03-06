<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagem',255);
            $table->integer('ordem')->length(11)->nullable('0');
            $table->integer('largura')->length(11)->nullable();
            $table->string('legenda',255)->nullable();
            $table->tinyInteger('ativo')->nullable('1');
            $table->tinyInteger('deleted')->nullable('0');
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
        Schema::dropIfExists('portfolios');
    }
}
