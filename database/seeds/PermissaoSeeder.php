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
            ['tx_nome_permissao' => 'TEMATICA_CURSO_LISTAR'],
            ['tx_nome_permissao' => 'TEMATICA_CURSO_DETALHAR'],
            ['tx_nome_permissao' => 'TEMATICA_CURSO_INCLUIR'],
            ['tx_nome_permissao' => 'TEMATICA_CURSO_EDITAR'],
            ['tx_nome_permissao' => 'TEMATICA_CURSO_EXCLUIR'],
            ['tx_nome_permissao' => 'USUARIO_LISTAR'],
            ['tx_nome_permissao' => 'USUARIO_DETALHAR'],
            ['tx_nome_permissao' => 'USUARIO_INCLUIR'],
            ['tx_nome_permissao' => 'USUARIO_EDITAR'],
            ['tx_nome_permissao' => 'USUARIO_EXCLUIR'],
        ];

        foreach ($permissao as $value) {
            Permissao::create($value);
        }
    }
}
