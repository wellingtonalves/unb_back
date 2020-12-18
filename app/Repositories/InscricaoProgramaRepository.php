<?php

namespace App\Repositories;

use App\Models\InscricaoPrograma;

class InscricaoProgramaRepository extends AbstractRepository
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
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return InscricaoPrograma::class;
    }

}
