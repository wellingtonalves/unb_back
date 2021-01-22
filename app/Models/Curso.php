<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected $appends = ['oferta_atual'];

    /**
     * @return string
     */
    public function getOfertaAtualAttribute()
    {
        return $this->oferta()->where('tp_tipo_turma', '=', 'A')->first();
//        return Oferta::where('tp_tipo_turma', '=', 'A');
    }


    public function tematicaCurso(): BelongsTo
    {
        return $this->belongsTo(TematicaCurso::class, 'id_tematica_curso', 'id_tematica_curso');
    }

    public function oferta(): HasMany
    {
        return $this->hasMany(Oferta::class, 'id_curso', 'id_curso');
    }
}
