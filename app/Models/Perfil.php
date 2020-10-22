<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends AbstractModel
{
    protected $table = 'tb_perfil';
    protected $primaryKey = 'id_perfil';

    protected $fillable = [
        'tx_nome_perfil'
    ];

    /**
     * The nested's (relations)
     * @var array
     */
    public $nested = [
        'permissao'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_perfil', 'id_perfil');
    }

    public function permissao(): BelongsToMany
    {
        return $this->belongsToMany(Permissao::class, 'tb_perfil_permissao', 'id_perfil', 'id_permissao');
    }

}
