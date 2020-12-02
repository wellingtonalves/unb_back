<?php

namespace App\Repositories;

use App\Models\Inscricao;

class InscricaoRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'oferta',
        'pessoa',
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_inscricao',
        'id_oferta',
        'id_pessoa',
        'nr_codigo_validador',
        'tp_situacao_inscricao',
        'dt_fim_inscricao'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Inscricao::class;
    }

}
