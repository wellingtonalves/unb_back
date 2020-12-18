<?php

namespace App\Repositories;

use App\Models\ProgramaCurso;

class ProgramaCursoRepository extends AbstractRepository
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
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProgramaCurso::class;
    }
}
