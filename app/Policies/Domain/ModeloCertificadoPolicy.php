<?php

namespace App\Policies\Domain;

use App\Models\Usuario;
use App\Policies\AbstractPolicy;

class ModeloCertificadoPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('MODELO_CERTIFICADO_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('MODELO_CERTIFICADO_DETALHAR', $usuario);
    }
}
