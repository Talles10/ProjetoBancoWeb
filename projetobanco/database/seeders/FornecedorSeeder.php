<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fornecedor::create([
            'nome' => 'Fornecedor Padrão',
            'documento' => '12345678901234',
            'email' => 'fornecedor@padrao.com',
            'telefone' => '1234567890',
            'endereco' => 'Endereço Padrão, 123',
            'produtos_disponiveis' => 'Todos os produtos',
            'formas_pagamento' => 'Dinheiro, Cartão'
        ]);
    }
}
