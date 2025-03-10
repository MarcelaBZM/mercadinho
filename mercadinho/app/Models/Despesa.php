<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model {
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'data'];
}
