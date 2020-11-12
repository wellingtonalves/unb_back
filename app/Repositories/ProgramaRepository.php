<?php

namespace App\Repositories;

use App\Models\Programa;

class ProgramaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = ['programaCurso'];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tx_nome_programa' => 'ilike',
        'tp_situacao_programa',
        'bl_programa_destaque',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Programa::class;
    }
}
