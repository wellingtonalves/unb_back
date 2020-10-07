<?php

namespace App\Repositories;


use App\Models\Domain\Municipio;

class MunicipioRepository extends AbstractRepository
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
        'tx_nome_municipio' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Municipio::class;
    }

}
