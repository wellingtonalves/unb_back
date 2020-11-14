<?php

namespace App\Repositories\Domain;

use App\Models\Domain\CriterioPrograma;
use App\Repositories\AbstractRepository;

class CriterioProgramaRepository extends AbstractRepository
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
    protected $fieldSearchable = [];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CriterioPrograma::class;
    }

}
