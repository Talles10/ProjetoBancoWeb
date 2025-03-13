<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Metodo up é o metodo que é executado quando a migration é executada
    {
        Schema::create('categorias', function (Blueprint $table) {//categorias é o nome da tabela
            $table->id();//id é o campo que é a chave primaria
            $table->string('nome', 100);//string é o tipo do campo, 100 é o tamanho do campo
            $table->text('descricao')->nullable();//nullable é para permitir que o campo seja nulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
