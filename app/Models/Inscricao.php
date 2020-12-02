<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscricao extends AbstractModel
{
    protected $table = 'tb_inscricao';
    protected $primaryKey = 'id_inscricao';

    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'id_oferta');
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id_pessoa');
    }
}
