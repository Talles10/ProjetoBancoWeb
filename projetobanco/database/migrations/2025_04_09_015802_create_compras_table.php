<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::create('compras', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('produto_id');
        $table->integer('quantidade');
        $table->decimal('preco_total', 10, 2);
        $table->timestamps();
        $table->date('data_compra');
        $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
    });
}
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
