<?php

namespace App\Models;

use App\Models\Oferta;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscricao extends AbstractModel
{
    protected $table = 'tb_inscricao';
    protected $primaryKey = 'id_inscricao';
    protected $fillable = [
        'id_inscricao',
        'id_legado_inscricao',
        'id_oferta',
        'id_pessoa',
        'nr_codigo_validador',
        'dt_inscricao',
        'id_municipio_servidor_municipal',
        'tp_situacao_inscricao',
        'qt_nota_final',
        'tp_motivo_realiz_curso',
        'tp_servidor_militar_cidadao',
        'tp_cidadao_empregado',
        'tp_poder_execut_legisl_judic',
        'sg_uf_servidor_estadual',
        'tp_esfera_servidor_militar',
        'id_orgao_servidor',
        'tp_forca_militar',
        'id_municipio_endereco_residencial',
        'id_municipio_endereco_comercial',
        'tp_necessario_notif_chefia',
        'tx_email_chefia',
        'tp_necess_identificar_inscricao',
        'tp_identificador_orgao',
        'tp_empregado_publico',
        'tp_ocupa_cargo_funcao',
        'created_at',
        'updated_at',
        'dt_fim_inscricao',
        'id_pais',
        'tp_sem_vinculo',
        'dt_encerramento',
        'tp_encerramento',
        'tp_migrado_webcef',
        'deleted_at',
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

    /**
     * @return HasOne
     */
    public function certificado(): HasOne
    {
        return $this->hasOne(Certificado::class, 'id_certificado', 'id_inscricao');
    }

    public function avaliacaoInscrito()
    {
        return $this->hasMany(AvaliacaoInscrito::class, 'id_inscricao');
    }
}
