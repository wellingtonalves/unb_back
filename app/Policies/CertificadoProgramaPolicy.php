<?php

namespace App\Policies;

use App\Models\Usuario;

class CertificadoProgramaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('CERTIFICADO_PROGRAMA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('CERTIFICADO_PROGRAMA_DETALHAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('CERTIFICADO_PROGRAMA_INCLUIR', $usuario);
    }
}
