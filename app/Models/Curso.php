<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends AbstractModel
{
    protected $table = 'tb_curso';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'id_legado_curso',
        'id_tematica_curso',
        'qt_carga_horaria_minima',
        'tx_nome_curso',
        'tp_situacao_curso',
        'tx_conteudo_programatico',
        'tx_apresentacao',
        'tx_url_imagem_curso',
        'tx_url_video_curso',
        'bl_destaque_curso',
        'nr_ordem_curso',
        'tp_origem_curso',
        'dt_lancamento'
    ];

    public function tematicaCurso(): BelongsTo
    {
        return $this->belongsTo(TematicaCurso::class, 'id_tematica_curso', 'id_tematica_curso');
    }
}
