<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'Fornecedores';
    protected $fillable = ['nome', 'documento', 'endereco' , 'produtos_disponiveis', 'formas_pagamento', 'telefone', 'email'];
}
