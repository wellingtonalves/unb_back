<?php

namespace App\Repositories;

use App\Models\Orgao;

class OrgaoRepository extends AbstractRepository
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
        'tx_nome_orgao' => 'like',
        'bl_status_orgao',
        'id_vinculo',
        'id_esfera',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Orgao::class;
    }
}
