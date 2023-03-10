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
            ['tx_nome_permissao' => 'CURSO_LISTAR'], // id 1
            ['tx_nome_permissao' => 'CURSO_DETALHAR'], // id 2
            ['tx_nome_permissao' => 'CURSO_INCLUIR'], // id 3
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
            ['tx_nome_permissao' => 'AVA_LISTAR'],
            ['tx_nome_permissao' => 'AVA_DETALHAR'],
            ['tx_nome_permissao' => 'AVA_INCLUIR'],
            ['tx_nome_permissao' => 'AVA_EDITAR'],
            ['tx_nome_permissao' => 'AVA_EXCLUIR'],
            ['tx_nome_permissao' => 'OFERTA_LISTAR'],
            ['tx_nome_permissao' => 'OFERTA_DETALHAR'],
            ['tx_nome_permissao' => 'OFERTA_INCLUIR'],
            ['tx_nome_permissao' => 'OFERTA_EDITAR'],
            ['tx_nome_permissao' => 'OFERTA_EXCLUIR'],
            ['tx_nome_permissao' => 'ORGAO_LISTAR'],
            ['tx_nome_permissao' => 'ORGAO_DETALHAR'],
            ['tx_nome_permissao' => 'ORGAO_INCLUIR'],
            ['tx_nome_permissao' => 'ORGAO_EDITAR'],
            ['tx_nome_permissao' => 'ORGAO_EXCLUIR'],
            ['tx_nome_permissao' => 'PERFIL_LISTAR'],
            ['tx_nome_permissao' => 'PERFIL_DETALHAR'],
            ['tx_nome_permissao' => 'PERFIL_INCLUIR'],
            ['tx_nome_permissao' => 'PERFIL_EDITAR'],
            ['tx_nome_permissao' => 'PERFIL_EXCLUIR'],
            ['tx_nome_permissao' => 'PERMISSAO_LISTAR'],
            ['tx_nome_permissao' => 'PERMISSAO_DETALHAR'],
            ['tx_nome_permissao' => 'PERMISSAO_INCLUIR'],
            ['tx_nome_permissao' => 'PERMISSAO_EDITAR'],
            ['tx_nome_permissao' => 'PERMISSAO_EXCLUIR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_LISTAR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_DETALHAR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_INCLUIR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_EDITAR'],
            ['tx_nome_permissao' => 'SITUACAO_USUARIO_EXCLUIR'],
            ['tx_nome_permissao' => 'TAREFA_AGENDADA_LISTAR'],
            ['tx_nome_permissao' => 'TAREFA_AGENDADA_DETALHAR'],
            ['tx_nome_permissao' => 'TAREFA_AGENDADA_INCLUIR'],
            ['tx_nome_permissao' => 'TAREFA_AGENDADA_EDITAR'],
            ['tx_nome_permissao' => 'TAREFA_AGENDADA_EXCLUIR'],
            ['tx_nome_permissao' => 'PAIS_LISTAR'],
            ['tx_nome_permissao' => 'PAIS_DETALHAR'],
            ['tx_nome_permissao' => 'MUNICIPIO_LISTAR'],
            ['tx_nome_permissao' => 'MUNICIPIO_DETALHAR'],
            ['tx_nome_permissao' => 'UF_LISTAR'],
            ['tx_nome_permissao' => 'UF_DETALHAR'],
            ['tx_nome_permissao' => 'OFERTA_LISTAR'],
            ['tx_nome_permissao' => 'OFERTA_DETALHAR'],
            ['tx_nome_permissao' => 'OFERTA_INCLUIR'],
            ['tx_nome_permissao' => 'OFERTA_EDITAR'],
            ['tx_nome_permissao' => 'OFERTA_EXCLUIR'],
            ['tx_nome_permissao' => 'TIPO_OFETA_LISTAR'],
            ['tx_nome_permissao' => 'TIPO_OFETA_DETALHAR'],
            ['tx_nome_permissao' => 'MODELO_CERTIFICADO_LISTAR'],
            ['tx_nome_permissao' => 'MODELO_CERTIFICADO_DETALHAR'],
            ['tx_nome_permissao' => 'PARCEIRO_LISTAR'],
            ['tx_nome_permissao' => 'PARCEIRO_DETALHAR'],
            ['tx_nome_permissao' => 'PARCEIRO_INCLUIR'],
            ['tx_nome_permissao' => 'PARCEIRO_EDITAR'],
            ['tx_nome_permissao' => 'PARCEIRO_EXCLUIR'],
            ['tx_nome_permissao' => 'PROGRAMA_LISTAR'],
            ['tx_nome_permissao' => 'PROGRAMA_DETALHAR'],
            ['tx_nome_permissao' => 'PROGRAMA_INCLUIR'],
            ['tx_nome_permissao' => 'PROGRAMA_EDITAR'],
            ['tx_nome_permissao' => 'PROGRAMA_EXCLUIR'],
            ['tx_nome_permissao' => 'MEUS_DADOS_LISTAR'], // id 75
            ['tx_nome_permissao' => 'TIPO_EXCLUSIVIDADE_OFERTA_LISTAR'],
            ['tx_nome_permissao' => 'TIPO_EXCLUSIVIDADE_OFERTA_DETALHAR'],
            ['tx_nome_permissao' => 'EXCLUSIVIDADE_LISTAR'],
            ['tx_nome_permissao' => 'EXCLUSIVIDADE_DETALHAR'],
            ['tx_nome_permissao' => 'EXCLUSIVIDADE_INCLUIR'],
            ['tx_nome_permissao' => 'EXCLUSIVIDADE_EDITAR'],
            ['tx_nome_permissao' => 'CRITERIO_PROGRAMA_LISTAR'],
            ['tx_nome_permissao' => 'CRITERIO_PROGRAMA_DETALHAR'],
            ['tx_nome_permissao' => 'VALOR_EXCLUSIVIDADE_LISTAR'],
            ['tx_nome_permissao' => 'VALOR_EXCLUSIVIDADE_DETALHAR'],
            ['tx_nome_permissao' => 'VALOR_EXCLUSIVIDADE_INCLUIR'],
            ['tx_nome_permissao' => 'VALOR_EXCLUSIVIDADE_EDITAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_LISTAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_DETALHAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_INCLUIR'],
            ['tx_nome_permissao' => 'CERTIFICADO_EDITAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_PROGRAMA_LISTAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_PROGRAMA_DETALHAR'],
            ['tx_nome_permissao' => 'CERTIFICADO_PROGRAMA_INCLUIR'],
            ['tx_nome_permissao' => 'CERTIFICADO_PROGRAMA_EDITAR'],
            ['tx_nome_permissao' => 'ALUNO_INSCRICOES_LISTAR'],

            ['tx_nome_permissao' => 'VW_VALIDACAO_CERTIFICADO_DETALHAR'],
            ['tx_nome_permissao' => 'VW_CURSOS_REALIZADOS_LISTAR'],
            ['tx_nome_permissao' => 'VW_EMISSAO_CERTIFICADO_LISTAR'],

        ];

        foreach ($permissao as $value) {
            Permissao::firstOrCreate($value);
        }
    }
}
