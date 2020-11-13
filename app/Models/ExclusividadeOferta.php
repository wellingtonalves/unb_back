<?php

namespace App\Models;

use App\Models\Domain\TipoExclusividadeOferta;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExclusividadeOferta extends AbstractModel
{
    protected $table = 'tb_exclusividade_oferta';
    protected $primaryKey = 'id_exclusividade_oferta';

    protected $fillable = [
        'id_oferta',
        'id_orgao_parceiro',
        'id_tipo_exclusividade_oferta',
        'tx_descricao_exclusividade',
    ];

    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'id_oferta');
    }

    public function tipoExclusividade(): BelongsTo
    {
        return $this->belongsTo(TipoExclusividadeOferta::class, 'id_tipo_exclusividade_oferta', 'id_tipo_exclusividade_oferta');
    }

    public function orgaoParceiros(): BelongsTo
    {
        return $this->belongsTo(Parceiro::class, 'id_orgao_parceiro', 'id_parceiros');
    }
}
