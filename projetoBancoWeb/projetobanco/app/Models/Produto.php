<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'estoque', 'categoria_id'];

    public function categoria()//relacionamento de 1 para 1
    {
        return $this->belongsTo(Categoria::class);//um produto pertence a uma categoria
    }
}

