<?php

namespace App\Services;


use App\Repositories\UsuarioRepository;

class UsuarioService extends AbstractService
{

    /**
     * @var UsuarioRepository
     */
    protected $repository;

    /**
     * CursoService constructor.
     * @param UsuarioRepository $repository
     */
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }
}
