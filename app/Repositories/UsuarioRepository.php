<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository extends AbstractRepository
{
    /**
     * Relationships (with)
     * @var array
     */
    public $relationships = [];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_situacao_usuario',
        'id_perfil',
        'tx_login_usuario',
        'tp_metodo_autenticacao',
        'dt_alteracao_login',
        'id_rede_social'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Usuario::class;
    }
}
