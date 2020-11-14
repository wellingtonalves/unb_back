<?php

namespace App\Policies\Domain;

use App\Policies\AbstractPolicy;
use App\Models\Usuario;

class CriterioProgramaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('CRITERIO_PROGRAMA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('CRITERIO_PROGRAMA_DETALHAR', $usuario);
    }

}
