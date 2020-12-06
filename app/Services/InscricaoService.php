<?php

namespace App\Services;

use App\Models\Ava;
use App\Models\Oferta;
use App\Repositories\InscricaoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InscricaoService extends AbstractService
{

    /**
     * @var InscricaoRepository
     */
    protected $repository;

    /**
     * @var false|string
     */
    private $today;

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
     * @param InscricaoRepository $repository
     */
    public function __construct(InscricaoRepository $repository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
        $this->today = date('Y-m-d H:m:s', time());
    }

    /**
     * @return mixed
     */
    public function retornaCursosEmAndamento()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', '=', auth()->user()->getAuthIdentifier()],
                    ['tp_situacao_inscricao', '=', 'EM_CURSO']
                ])->orWhere([
                    ['id_pessoa', '=', auth()->user()->getAuthIdentifier()],
                    ['dt_fim_inscricao', '>=', $this->today],
                    ['tp_situacao_inscricao', '=', 'APROVADO']
                ]);
            });

            $inscricoes = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
            
            for($i=0;$i<count($inscricoes);$i++) {
                $inscricoes[$i]->tx_url_ava = $this->retornaUrlCursoAva($inscricoes[$i]->oferta);
            }

            return Response::custom('success_operation', $inscricoes);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     */
    public function retornaCursosFinalizado()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', auth()->user()->getAuthIdentifier()],
                    ['dt_fim_inscricao', '<', $this->today]
                ]);
            });
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     */
    public function retornaCursostrancado()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', auth()->user()->getAuthIdentifier()],
                    ['tp_situacao_inscricao', 'CANC_DESISTENTE'],
                    ['dt_fim_inscricao', '>=', $this->today]
                ]);
            });
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @param Oferta $oferta
     * @return mixed
     */
    protected function retornaUrlCursoAva(Oferta $oferta)
    {
        $typeAva = strtolower(trim($oferta->ava->tp_ava));
        $service =  $typeAva . 'Service';
        $metodoAtualizaUsuario = 'retornaUrlCurso' . ucfirst($typeAva);
        return $this->$service->$metodoAtualizaUsuario($oferta, $oferta->ava);
    }
}
