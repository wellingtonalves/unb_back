<?php

namespace App\Policies;

use App\Models\Usuario;

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

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('MODELO_CERTIFICADO_INCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario)
    {
        return self::check('MODELO_CERTIFICADO_EDITAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function destroy(Usuario $usuario)
    {
        return self::check('MODELO_CERTIFICADO_EXCLUIR', $usuario);
    }
}
