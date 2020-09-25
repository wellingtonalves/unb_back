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
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_orgao',
        'tx_url',
        'tp_situacao_ava',
        'tp_operacional',
        'tx_token',
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
