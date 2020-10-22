<?php

namespace App\Services;

use App\Repositories\AvaRepository;
use App\Services\AbstractService;
use Exception;
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
     * AvaService constructor.
     * @param AvaRepository $repository
     */
    public function __construct(AvaRepository $repository, MoodleService $moodleService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
    }

    /**
     *
     * @param int $id
     * @return AvaRepository
     * @throws Exception
     */
    public function find($id)
    {
        $ava = parent::find($id);
        $ava->tp_ava = trim($ava->tp_ava);
        
        return $ava;
    }

    /**
     *
     * @param $request
     * @return AvaRepository
     * @throws Exception
     */
    public function create($request)
    {
        $infoSite = $this->buscaInfoSite($request);
        $statusOperacao = 'success_operation';
        if ($infoSite instanceof Exception) {
            $request->merge(['tp_situacao_ava' => 'I']);
            $request->merge(['tp_operacional' => 'N']);
            $statusOperacao = 'error_operation';
        }

        $ava = parent::create($request);
        $ava->statusOperacao = $statusOperacao;
        return $ava;
    }

    /**
     *
     * @param $request
     * @return AvaRepository
     * @throws Exception
     */
    public function update($request, $id)
    {
        $infoSite = $this->buscaInfoSite($request);
        $statusOperacao = 'success_operation';
        if ($infoSite instanceof Exception) {
            $request->merge(['tp_situacao_ava' => 'I']);
            $request->merge(['tp_operacional' => 'N']);
            $statusOperacao = 'error_operation';
        }

        $ava = parent::update($request, $id);
        $ava->statusOperacao = $statusOperacao;
        return $ava;
    }
    
    /**
     * Retorna o tipo de AVA para ser utilizado nas chamadas dos metodos do AVA
     *
     * @param string $tipoAva
     * @return string
     */
    public function tipoAva($tipoAva = null)
    {
        if ($tipoAva) {
            switch ($tipoAva) {
                case 'MOODLE':
                    return 'Moodle';
                case 'CANVAS':
                    return 'Canvas';
            }
        }
    }

    /**
     * Busca informacoes para validar AVA de acordo por tipo de AVA
     *
     * @param Request $request
     * @return mixed
     */
    protected function buscaInfoSite($request)
    {
        $tipoAva = $this->tipoAva($request->tp_ava);
        $service = strtolower($tipoAva).'Service';
        $metodoInfoSite = 'buscaInfoSite' . $tipoAva;

        return $this->$service->$metodoInfoSite($request->tx_url, $request->tx_token);
    }
}
