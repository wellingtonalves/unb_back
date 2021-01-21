<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\InscricaoAlunoException;
use App\Http\Controllers\AbstractController;
use App\Models\Inscricao;
use App\Services\InscricaoService;
use Illuminate\Auth\Access\AuthorizationException;
use Prettus\Repository\Exceptions\RepositoryException;

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
     * @throws AuthorizationException
     * @throws RepositoryException
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
     * @return mixed
     * @throws RepositoryException
     */
    public function gerarComprovanteInscricao($id)
    {
        return $this->service->gerarComprovanteInscricao($id);
    }

    /**
     * @param $tipo
     * @return mixed
     */
    public function cursosMaisAcessados($tipo)
    {

        if ($tipo === 'dia') {
            return $this->service->cursosMaisAcessados(1);
        }

        if ($tipo === 'semana') {
            return $this->service->cursosMaisAcessados(7);
        }

        if ($tipo === 'mes') {
            return $this->service->cursosMaisAcessados(30);
        }

        new InscricaoAlunoException();
    }

}
