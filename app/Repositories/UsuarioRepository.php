<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository extends AbstractRepository
{
    /**
     * Relationships (with)
     * @var array
     */
    public $relationships = [
        'pessoa',
        'perfil.permissao',
        'situacaoUsuario'
    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_situacao_usuario',
        'id_perfil',
        'tx_login_usuario' => 'like',
        'pessoa.tx_nome_pessoa' => 'like',
        'pessoa.tx_email_pessoa' => 'like',
        'pessoa.nr_cpf'
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
