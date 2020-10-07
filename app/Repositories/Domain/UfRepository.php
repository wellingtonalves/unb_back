<?php

namespace App\Repositories\Domain;


use App\Models\Domain\UF;
use App\Repositories\AbstractRepository;

class UfRepository extends AbstractRepository
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
        'sg_uf',
        'tx_nome_uf' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UF::class;
    }

}
