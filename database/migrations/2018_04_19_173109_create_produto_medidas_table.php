<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_medidas', function (Blueprint $table) {
            $table->increments('id');
				$table->integer('id_medidas');
				$table->integer('id_produtos');
				$table->text('botao1')->nullable(1);
				$table->text('botao2')->nullable(1);
				$table->text('botao3')->nullable(1);
				$table->tinyInteger('ativo')->nullable(1)->default('1');
            $table->tinyInteger('deleted')->nullable(1)->default('0');            
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
        Schema::dropIfExists('produto_medidas');
    }
}
