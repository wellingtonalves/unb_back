<?php

namespace App\Repositories;

use App\Models\ExclusividadeOferta;

class ExclusividadeOfertaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'oferta',
        'tipoExclusividade',
        'orgaoParceiros'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_oferta',
        'id_orgao_parceiro',
        'id_tipo_exclusividade_oferta',
        'tipoExclusividade.tx_nome_tipo_exclusividade_oferta'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ExclusividadeOferta::class;
    }

}
