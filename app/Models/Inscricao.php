<?php

namespace App\Models;

use App\Models\Oferta;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscricao extends AbstractModel
{
    protected $table = 'tb_inscricao';
    protected $primaryKey = 'id_inscricao';
    protected $fillable = [
        'id_inscricao',
        'id_oferta',
        'id_pessoa',
        'nr_codigo_validador',
        'dt_inscricao',
        'id_municipio_servidor_municipal',
        'tp_situacao_inscricao',
        'qt_nota_final',
        'tp_motivo_realiz_curso',
        'dt_fim_inscricao',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'dt_inscricao_formatada',
        'dt_fim_inscricao_formatada'
    ];

    /**
     * @return false|string|null
     */
    public function getDtInscricaoFormatadaAttribute()
    {
        return formataData($this->attributes['dt_inscricao']);
    }

    /**
     * @return false|string|null
     */
    public function getDtFimInscricaoFormatadaAttribute()
    {
        return formataData($this->attributes['dt_fim_inscricao']);
    }

    /**
     * @return BelongsTo
     */
    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'id_oferta');
    }

    /**
     * @return BelongsTo
     */
    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id_pessoa');
    }
}
