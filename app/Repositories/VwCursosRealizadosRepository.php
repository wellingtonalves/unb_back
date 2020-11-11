<?php

namespace App\Repositories;

use App\Models\View\VwCursosRealizados;

class VwCursosRealizadosRepository extends AbstractRepository
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
        'nr_cpf',
        'tx_email'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VwCursosRealizados::class;
    }

}
