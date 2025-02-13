<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->nullOnDelete();
            $table->dateTime('data_venda')->useCurrent();
            $table->timestamps();
            $table->decimal('valor_total', 10, 2)->NULL;

        });        
    }

    public function down(): void {
        Schema::dropIfExists('vendas');
    }
    
    public function produtos()
    {
    return $this->belongsToMany(Produto::class)
                ->withPivot('quantidade', 'preco');  // Inclui a quantidade
    }

};
