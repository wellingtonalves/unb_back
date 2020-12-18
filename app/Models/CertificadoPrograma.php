<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificadoPrograma extends AbstractModel
{
    protected $table = 'tb_certificado_programa';
    protected $primaryKey = 'id_certificado_programa';

    protected $fillable = [
        'id_certificado_programa',
        'sg_pais_nacionalidade',
        'dt_emissao_certificado',
        'nr_codigo_validador_programa',
        'tx_nome_pessoa',
        'dt_nascimento',
        'nr_cpf',
    ];

    /**
     * @return BelongsTo
     */
    public function inscricao(): BelongsTo
    {
        return $this->belongsTo(InscricaoPrograma::class, 'id_certificado_programa', 'id_inscricao_programa');
    }
}
