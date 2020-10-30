<?php

namespace App\Repositories;

use App\Models\TarefaAgendada;

class TarefaAgendadaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'ava'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tx_nome_tarefa_agendada' => 'like',
        'tx_nome_comando' => 'like',
        'tp_situacao_tarefa_agendada',
        'id_ava'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TarefaAgendada::class;
    }
}
