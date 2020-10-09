<?php

namespace App\Models;
use AlexAlexandre\MappableModels\Traits\HasNestedAttributes;
use App\Models\Domain\SituacaoUsuario;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable, HasNestedAttributes;
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
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        return $this->where('tx_login_usuario', $username)->first();
    }

    public function getAuthPassword()
    {
        return $this->tx_senha_usuario;
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_usuario', 'id_pessoa');
    }

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'id_perfil', 'id_perfil');
    }

    public function situacaoUsuario(): HasOne
    {
        return $this->hasOne(SituacaoUsuario::class, 'id_situacao_usuario', 'id_situacao_usuario');
    }

}
