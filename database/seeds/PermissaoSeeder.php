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
            ['tx_nome_permissao' => 'PERFIL_LISTAR'],
            ['tx_nome_permissao' => 'PERFIL_DETALHAR'],
            ['tx_nome_permissao' => 'PERFIL_INCLUIR'],
            ['tx_nome_permissao' => 'PERFIL_EDITAR'],
            ['tx_nome_permissao' => 'PERFIL_EXCLUIR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_LISTAR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_DETALHAR'],
            ['tx_nome_permissao' => 'PAIS_LISTAR'],
            ['tx_nome_permissao' => 'PAIS_DETALHAR'],
            ['tx_nome_permissao' => 'MUNICIPIO_LISTAR'],
            ['tx_nome_permissao' => 'MUNICIPIO_DETALHAR'],
            ['tx_nome_permissao' => 'UF_LISTAR'],
            ['tx_nome_permissao' => 'UF_DETALHAR'],
        ];

        foreach ($permissao as $value) {
            Permissao::create($value);
        }
    }
}
