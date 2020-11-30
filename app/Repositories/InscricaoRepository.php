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
        'pessoa'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tp_ava',
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
