<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'categoria_id', 'preco', 'quantidade', 'foto'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function vendas()
    {
        return $this->belongsToMany(Venda::class)
            ->withPivot('quantidade', 'preco')
            ->withTimestamps();
    }
}
