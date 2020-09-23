<?php

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissao = [
            ['tx_nome_permissao' => 'CURSO_LISTAR'],
            ['tx_nome_permissao' => 'CURSO_DETALHAR'],
            ['tx_nome_permissao' => 'CURSO_INCLUIR'],
            ['tx_nome_permissao' => 'CURSO_EDITAR'],
            ['tx_nome_permissao' => 'CURSO_EXCLUIR'],
        ];

        foreach ($permissao as $value) {
            Permissao::create($value);
        }
    }
}
