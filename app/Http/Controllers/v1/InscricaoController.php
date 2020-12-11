<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\InscricaoAlunoException;
use App\Http\Controllers\AbstractController;
use App\Models\Inscricao;
use App\Services\InscricaoService;

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

}
