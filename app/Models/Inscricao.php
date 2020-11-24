<?php

namespace App\Models;

use App\Models\{Oferta, Pessoa};
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
