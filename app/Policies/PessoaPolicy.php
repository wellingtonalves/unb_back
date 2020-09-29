<?php

namespace App\Policies;

use App\Models\Usuario;

class PessoaPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('PESSOA_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('PESSOA_DETALHAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('PESSOA_INCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario)
    {
        return self::check('PESSOA_EDITAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function destroy(Usuario $usuario)
    {
        return self::check('PESSOA_EXCLUIR', $usuario);
    }
}
