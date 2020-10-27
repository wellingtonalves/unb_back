<?php

namespace App\Policies;

use App\Models\Usuario;

class VwCursosRealizadosPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('VW_CURSOS_REALIZADOS_LISTAR', $usuario);
    }

}
