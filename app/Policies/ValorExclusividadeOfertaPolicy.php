<?php

namespace App\Policies;

use App\Models\Usuario;

class ValorExclusividadeOfertaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('VALOR_EXCLUSIVIDADE_OFERTA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('VALOR_EXCLUSIVIDADE_OFERTA_DETALHAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('VALOR_EXCLUSIVIDADE_OFERTA_INCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario)
    {
        return self::check('VALOR_EXCLUSIVIDADE_OFERTA_EDITAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function destroy(Usuario $usuario)
    {
        return self::check('VALOR_EXCLUSIVIDADE_OFERTA_EXCLUIR', $usuario);
    }
}
