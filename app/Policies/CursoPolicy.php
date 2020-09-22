<?php

namespace App\Policies;

use App\Models\Usuario;

class CursoPolicy extends AbstractPolicy
{

    public function index(Usuario $usuario)
    {
        return self::check('CURSO_LISTAR', $usuario);
    }
}
