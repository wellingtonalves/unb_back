<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificado extends AbstractModel
{
    protected $table = 'tb_certificado';
    protected $primaryKey = 'id_certificado';

    protected $fillable = [
        'id_certificado',
        'id_inscricao_programa',
        'sg_pais_nacionalidade',
        'dt_emissao_certificado',
        'nr_codigo_validador',
        'nr_codigo_validador_legado',
        'tx_nome_pessoa',
        'dt_nascimento',
        'nr_cpf',
    ];

    protected $appends = ['dt_emissao_certificado_formatada'];

    /**
     * @return BelongsTo
     */
    public function inscricao(): BelongsTo
    {
        return $this->belongsTo(Inscricao::class, 'id_certificado', 'id_inscricao');
    }

    /**
     * @return false|string|null
     */
    public function getDtEmissaoCertificadoFormatadaAttribute()
    {
        return formataData($this->attributes['dt_emissao_certificado']);
    }
}
