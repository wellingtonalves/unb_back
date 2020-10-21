<?php

namespace App\Repositories;


use App\Models\Perfil;

class PerfilRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'permissao'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_perfil',
        'tx_nome_perfil' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Perfil::class;
    }

}
