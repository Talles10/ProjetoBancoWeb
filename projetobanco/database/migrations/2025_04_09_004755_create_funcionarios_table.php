<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('documento', 20)->unique();
            $table->decimal('salario', 10, 2);
            $table->string('cargo', 50);
            $table->string('email', 100)->unique();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
