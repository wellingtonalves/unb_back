<?php

namespace App\Repositories;

use App\Models\ValorExclusividadeOferta;

class ValorExclusividadeOfertaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'exclusividade',
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'valor_exclusividade',
        'id_exclusividade_oferta'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ValorExclusividadeOferta::class;
    }

}
