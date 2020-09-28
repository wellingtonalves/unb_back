<?php

namespace App\Repositories;

use App\Models\Orgao;

class OrgaoRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_responsavel_legal',
        'tx_nome_orgao',
        'nr_cnpj',
        'id_vinculo',
        'id_esfera',
        'bl_status_orgao',
        'tx_sigla_orgao',
        'tx_url_imagem_orgao',
        'bl_instituicao_parceira',
        'tx_link_orgao',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Orgao::class;
    }
}
