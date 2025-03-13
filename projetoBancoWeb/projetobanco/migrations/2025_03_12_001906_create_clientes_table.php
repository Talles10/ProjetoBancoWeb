<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Tudo que deve ser feito está dentro desse Schema
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();//Chave primaria
            $table->string('nome', 100); //Varchar 100
            $table->string('email')->unique(); //Permite que seja apenas um email
            $table->decimal('salario', 8, 2);//8 casas decimais, 2 após a virgula
            $table->string('telefone')->nullable();
            


            $table->timestamps();//Campos criados na tabela (Quando um registro foi criado e quando foi alterado gerenciados pela aplicação(pode ser usado com relatório))
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
