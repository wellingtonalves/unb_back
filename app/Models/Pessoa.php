<?php

namespace App\Models;
use App\Models\Domain\Pais;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pessoa extends AbstractModel
{

    protected $table        = 'tb_pessoa';
    protected $primaryKey   = 'id_pessoa';
    public    $incrementing = false;

    protected $fillable = [
        'id_pessoa',
        'id_legado_pessoa',
        'sg_pais_nacionalidade',
        'id_municipio_nascimento',
        'tx_nome_pessoa',
        'tx_nome_social',
        'tp_sexo',
        'nr_passaporte',
        'tx_email_pessoa',
        'tx_email_institucional',
        'dt_nascimento',
        'nr_cpf',
        'sg_pais_nascimento',
    ];

    public function usuario(): HasOne
    {
        return $this->hasOne(Usuario::class, 'id_usuario', 'id_pessoa');
    }

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'sg_pais_nacionalidade');
    }

}
