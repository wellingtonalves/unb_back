<?php

namespace App\Repositories;

use App\Models\Ava;

class AvaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'orgao'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tx_url' => 'like',
        'tp_situacao_ava',
        'tx_nome_ava' => 'like',
        'tp_ava',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ava::class;
    }

}
