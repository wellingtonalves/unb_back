<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\InscricaoAlunoException;
use App\Http\Controllers\AbstractController;
use App\Models\Inscricao;
use App\Services\InscricaoService;
use Illuminate\Http\Request;

class InscricaoController extends AbstractController
{
    /**
     * @var InscricaoService
     */
    protected $service;

    /**
     * @var Inscricao
     */
    protected $model;

    /**
     * CursoController constructor.
     * @param InscricaoService $service
     * @param Inscricao $model
     */
    public function __construct(InscricaoService $service, Inscricao $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param $tipoCurso
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function cursosAluno($tipoCurso)
    {
        $this->authorize('cursosAluno', $this->model);

        if ($tipoCurso === 'andamento') {
            return $this->service->retornaCursosEmAndamento();
        }

        if ($tipoCurso === 'finalizado') {
            return $this->service->retornaCursosFinalizado();
        }

        if ($tipoCurso === 'trancado') {
            return $this->service->retornaCursostrancado();
        }

        new InscricaoAlunoException();
    }

    /**
     * @param $nrCodigoValidador
     * @return mixed
     */
    public function validar($nrCodigoValidador)
    {
        return $this->service->validar($nrCodigoValidador);
    }
    /**
     * @return mixed
     */
    public function comprovantesInscricao()
    {
        return $this->service->comprovantesInscricao();
    }

    /**
     * @param $id
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function gerarComprovanteInscricao($id)
    {
        return $this->service->gerarComprovanteInscricao($id);
    }
}
