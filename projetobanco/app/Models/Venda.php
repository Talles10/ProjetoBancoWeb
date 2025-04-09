<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $fillable = ['produto_id', 'quantidade', 'preco_total'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
