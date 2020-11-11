<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscricao extends AbstractModel
{
    protected $table = 'tb_inscricao';
    protected $primaryKey = 'id_inscricao';
}
