<?php

namespace App\Repositories\Domain;

use App\Models\Domain\TipoExclusividadeOferta;
use App\Repositories\AbstractRepository;

class TipoExclusividadeOfertaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_tipo_exclusividade_oferta',
        'tx_nome_tipo_exclusividade_oferta'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoExclusividadeOferta::class;
    }

}
