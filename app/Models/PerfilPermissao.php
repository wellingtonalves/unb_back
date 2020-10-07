<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerfilPermissao extends AbstractModel
{
    protected $table = 'tb_perfil_permissao';
    protected $primaryKey = 'id_perfil_permissao';

    protected $fillable = ['id_perfil', 'id_permissao'];

}
