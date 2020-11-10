<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarefaAgendada extends AbstractModel
{

    protected $table = 'tb_tarefa_agendada';
    protected $primaryKey = 'id_tarefa_agendada';

    protected $fillable = [
        'id_ava',
        'tx_nome_tarefa_agendada',
        'tx_nome_comando',
        'tx_minuto',
        'tx_hora',
        'tx_dia_mes',
        'tx_mes',
        'tx_dia_semana',
        'dt_ultimo_periodo',
        'dt_proximo_periodo',
        'tp_situacao_tarefa_agendada'
    ];

    /**
     * Ava
     *
     * @return BelongsTo
     */
    public function ava(): BelongsTo
    {
        return $this->belongsTo(Ava::class, 'id_ava');
    }
}
