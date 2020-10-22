<?php

namespace App\Policies\Domain;

use App\Policies\AbstractPolicy;
use App\Models\Usuario;

class PaisPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('PAIS_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('PAIS_DETALHAR', $usuario);
    }

}
