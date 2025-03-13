<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model //Possue todos os metodos pra fazer a modulação dos dados(Inserir, alterar, excluir,)Toda vez que uma model for criada, é necessario prencher aqui 

{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'cpf']; //Aqui é onde é definido os campos que podem ser preenchidos, para que não haja problemas de segurança
}
