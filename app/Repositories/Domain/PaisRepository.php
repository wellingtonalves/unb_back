<?php

namespace App\Repositories\Domain;

use App\Repositories\AbstractRepository;
use App\Models\Domain\Pais;

class PaisRepository extends AbstractRepository
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
        'sg_pais',
        'tx_nome_pais' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pais::class;
    }

}
