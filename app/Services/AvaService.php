<?php

namespace App\Services;

use App\Repositories\AvaRepository;
use App\Services\AbstractService;
use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;

class AvaService extends AbstractService
{

    /**
     * @var AvaRepository
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
     * AvaService constructor.
     * @param AvaRepository $repository
     */
    public function __construct(AvaRepository $repository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
    }

    /**
     *
     * @param int $id
     * @return Response
     */
    public function find($id)
    {
        try {
            $data = $this->repository->with($this->repository->relationships)->find($id);
            $data->tp_ava = trim($data->tp_ava);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     *
     * @param Request $request
     * @return Response
     */
    public function create($request)
    {
        return $this->cadastraOuAtualizaAva($request);
    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update($request, $id)
    {
        return $this->cadastraOuAtualizaAva($request, $id);
    }

    /**
     * Busca informacoes para validar AVA de acordo por tipo de AVA
     *
     * @param Request $request
     * @return mixed
     */
    protected function buscaInfoSite($request)
    {
        $tipoAva = strtolower(trim($request->tp_ava));
        $service = $tipoAva.'Service';
        $metodoInfoSite = 'buscaInfoSite' . ucfirst($tipoAva);

        return $this->$service->$metodoInfoSite($request->tx_url, $request->tx_token);
    }

    /**
     * Metodo para reutilizar codigo no update e create
     *
     * @param Request $request
     * @param null|int $id
     * @return Response
     */
    protected function cadastraOuAtualizaAva($request, $id = null)
    {
        try {
            $infoSite = $this->buscaInfoSite($request);
            $statusOperacao = 'success_operation';
            if ($infoSite instanceof Exception) {
                $request->merge(['tp_situacao_ava' => 'I']);
                $request->merge(['tp_operacional' => 'N']);
                $statusOperacao = 'partial_error_operation';
            }

            $data = $id ? $this->repository->update($request->all(), $id) : $this->repository->create($request->all());
            
            return Response::custom($statusOperacao, $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
