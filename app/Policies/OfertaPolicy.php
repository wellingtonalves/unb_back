<?php

namespace App\Policies;

use App\Models\Usuario;

class OfertaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('OFERTA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('OFERTA_DETALHAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('OFERTA_INCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario)
    {
        return self::check('OFERTA_EDITAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function destroy(Usuario $usuario)
    {
        return self::check('OFERTA_EXCLUIR', $usuario);
    }
}
