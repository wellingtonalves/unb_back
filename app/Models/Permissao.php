<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Permissao extends AbstractModel
{
    protected $table = 'tb_permissao';
    protected $primaryKey = 'id_permissao';

    protected $fillable = ['tx_nome_permissao'];

}
