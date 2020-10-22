<?php

namespace App\Policies\Domain;

use App\Policies\AbstractPolicy;
use App\Models\Usuario;

class MunicipioPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('MUNICIPIO_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('MUNICIPIO_DETALHAR', $usuario);
    }

}
