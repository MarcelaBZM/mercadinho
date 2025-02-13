<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantidadeToProdutoVendaTable extends Migration
{
    public function up()
    {
        Schema::table('produto_venda', function (Blueprint $table) {
            if (!Schema::hasColumn('produto_venda', 'quantidade')) {
                $table->integer('quantidade')->default(1);
            }
        });
    }

    public function down()
    {
        Schema::table('produto_venda', function (Blueprint $table) {
            $table->dropColumn('quantidade');  // Remove a coluna quantidade
        });
    }
}
