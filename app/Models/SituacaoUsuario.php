<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SituacaoUsuario extends AbstractModel
{
    protected $table        = 'tb_situacao_usuario';
    protected $primaryKey   = 'id_situacao_usuario';

    protected $fillable = [
        'tx_situacao_usuario',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_situacao_usuario', 'id_situacao_usuario');
    }
}
