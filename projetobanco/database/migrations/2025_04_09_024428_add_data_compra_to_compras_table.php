<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->date('data_compra')->after('preco_total');
        });
    }
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropColumn('data_compra');
        });
    }
};
