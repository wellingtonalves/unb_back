<?php

namespace App\Policies\Domain;

use App\Policies\AbstractPolicy;
use App\Models\Usuario;

class TipoExclusividadeOfertaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('TIPO_EXCLUSIVIDADE_OFERTA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('TIPO_EXCLUSIVIDADE_OFERTA_DETALHAR', $usuario);
    }

}
