<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataCompraToVendasTable extends Migration
{
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->timestamp('data_compra')->nullable(); // Adicionando a coluna 'data_compra'
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('data_compra'); // Caso precise reverter a alteração
        });
    }
}
