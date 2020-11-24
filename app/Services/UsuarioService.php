<?php

namespace App\Services;

use App\Repositories\InscricaoRepository;
use App\Repositories\UsuarioRepository;
use Symfony\Component\HttpFoundation\Request;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UsuarioService extends AbstractService
{

    /**
     * @var UsuarioRepository
     */
    protected $repository;

    /**
     * @var InscricaoRepository
     */
    protected $inscricaoRepository;

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
    public function __construct(UsuarioRepository $repository, InscricaoRepository $inscricaoRepository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->inscricaoRepository = $inscricaoRepository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        /**
         * Consulta inscricoes que o usuario ja realizou
         * Criar: Model Inscricao e Repository Inscricao que se relaciona com a oferta
         * 
         * tb_inscricao > tb_oferta > tb_ava
         */
        $inscricao = $this->inscricaoRepository->with($this->inscricaoRepository->relationships)->find($id);
        if ($inscricao) {
            $request->ava = $inscricao->oferta->ava;
            return $this->cadastraOuAtualizaAva($request, $id);
        }
        return $this->repository->update($request->all(), $id);
    }

    /**
     * Busca informacoes para validar AVA de acordo por tipo de AVA
     *
     * @param Request $request
     * @return mixed
     */
    protected function buscaInfoSite($request)
    {
        $typeAva = str_replace(' ', '', strtolower($request->ava->tp_ava));
        $service =  $typeAva . 'Service';
        $metodoInfoSite = 'buscaInfoSite' . ucfirst($typeAva);
        return $this->$service->$metodoInfoSite($request->ava->tx_url, $request->ava->tx_token);
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
            unset($request['ava']);
            $data = $id ? $this->repository->update($request->all(), $id) : $this->repository->create($request->all());

            return Response::custom($statusOperacao, $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
