<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'total', 'data_venda'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemVenda::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class)
            ->withPivot('quantidade', 'preco')  // Incluir quantidade e preço na tabela pivot
            ->withTimestamps();
    }
}
