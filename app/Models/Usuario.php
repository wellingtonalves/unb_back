<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens;
//    use SoftDeletes;

    protected $table        = 'tb_usuario';
    protected $primaryKey   = 'id_usuario';

    protected $fillable = [
        'id_situacao_usuario',
        'id_perfil',
        'tx_login_usuario',
        'tp_metodo_autenticacao',
        'dt_alteracao_login',
        'id_rede_social'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tx_senha_usuario',
        'remember_token',
    ];

    /**
     * TODO implementar as models (perfil, permissao, perfil-permissao) pra então implementar
     * todas as policies e começar a utilizar a forma correta de login
     *
     * @var array
     */
//    protected $with = ['perfil'];
}
