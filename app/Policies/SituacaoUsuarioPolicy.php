<?php

namespace App\Policies;

use App\Models\Usuario;

class SituacaoUsuarioPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('SITUACAO_USUARIO_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('SITUACAO_USUARIO_DETALHAR', $usuario);
    }

}
