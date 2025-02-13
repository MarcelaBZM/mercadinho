<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorTotalToVendas extends Migration
{
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->decimal('valor_total', 10, 2)->after('cliente_id');
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('valor_total');
        });
    }
}
