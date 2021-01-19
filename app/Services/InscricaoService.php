<?php

namespace App\Services;

use App\Exceptions\ValidarInscricaoException;
use App\Models\Oferta;
use App\Repositories\InscricaoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;

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
     * @param MoodleService $moodleService
     * @param CanvasService $canvasService
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
     * @throws RepositoryException
     */
    public function retornaCursosEmAndamento()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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

            $inscricoes->map(function ($item) {
                $item['tx_url_ava'] = $this->retornaUrlCursoAva($item->oferta);
            });

            return Response::custom('success_operation', $inscricoes);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function retornaCursosFinalizado()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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
     * @throws RepositoryException
     */
    public function retornaCursostrancado()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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
        $service = $typeAva . 'Service';
        $metodoAtualizaUsuario = 'retornaUrlCurso' . ucfirst($typeAva);
        return $this->$service->$metodoAtualizaUsuario($oferta, $oferta->ava);
    }

    /**
     * @param $nrCodigoValidador
     * @return InscricaoRepository|mixed
     */
    public function validar($nrCodigoValidador)
    {
        try {
            $data = $this->repository->with(['pessoa', 'oferta.curso'])
                ->where('nr_codigo_validador', '=', $nrCodigoValidador)->first();
            if (!$data) {
                throw new ValidarInscricaoException();
            }
            return Response::custom('success_operation', $data);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom(null, $exception);
        }
    }
}
