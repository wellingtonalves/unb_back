<?php

namespace App\Repositories\Domain;

use App\Models\Domain\TipoOferta;
use App\Repositories\AbstractRepository;

class TipoOfertaRepository extends AbstractRepository
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
        return TipoOferta::class;
    }

}
