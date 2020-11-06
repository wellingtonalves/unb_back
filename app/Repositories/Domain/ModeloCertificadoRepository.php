<?php

namespace App\Repositories\Domain;

use App\Models\Domain\ModeloCertificado;
use App\Repositories\AbstractRepository;

class ModeloCertificadoRepository extends AbstractRepository
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
        return ModeloCertificado::class;
    }

}
