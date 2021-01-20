<?php

namespace App\Policies;

use App\Models\Usuario;

class InscricaoPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('INSCRICAO_LISTAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('INSCRICAO_DETALHAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function store(Usuario $usuario)
    {
        return self::check('INSCRICAO_INCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario)
    {
        return self::check('INSCRICAO_EDITAR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function destroy(Usuario $usuario)
    {
        return self::check('INSCRICAO_EXCLUIR', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function cursosAluno(Usuario $usuario)
    {
        return self::check('INSCRICAO_CURSOS_ALUNO', $usuario);
    }

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function inscricoesAluno(Usuario $usuario)
    {
        return self::check('ALUNO_INSCRICOES_LISTAR', $usuario);
    }
}
