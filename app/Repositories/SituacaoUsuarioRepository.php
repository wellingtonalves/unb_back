<?php

namespace App\Repositories;


use App\Models\Domain\SituacaoUsuario;

class SituacaoUsuarioRepository extends AbstractRepository
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
        'id_situacao_usuario',
        'tx_nome_situacao_usuario' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SituacaoUsuario::class;
    }

}
