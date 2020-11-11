<?php

namespace App\Repositories;

use App\Models\Parceiro;

class ParceiroRepository extends AbstractRepository
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
        'id_tipo_parceiros'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Parceiro::class;
    }

}
