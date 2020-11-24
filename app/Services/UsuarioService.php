<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;
use Symfony\Component\HttpFoundation\Request;

class UsuarioService extends AbstractService
{

    /**
     * @var UsuarioRepository
     */
    protected $repository;

    /**
     * @var MoodleService
     */
    protected $moodleService;

    /**
     * @var CanvasService
     */
    protected $canvasService;

    /**
     * CursoService constructor.
     * @param UsuarioRepository $repository
     */
    public function __construct(UsuarioRepository $repository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
    }

    public function update(Request $request)
    {

        /**
         * Consulta inscricoes que o usuario ja realizou
         * Criar: Model Inscricao e Repository Inscricao que se relaciona com a oferta
         * 
         * tb_inscricao > tb_oferta > tb_ava
         */

        // Para fazer a chamada na API dos AVAs
        $service = strtolower($consulta->tp_ava).'Service';
        $metodoInfoSite = 'atualizaUsuario' . ucfirst(strtolower($request->tp_ava));
    }
}
