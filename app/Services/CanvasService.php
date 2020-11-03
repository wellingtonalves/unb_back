<?php

namespace App\Services;

use App\Repositories\CanvasRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class CanvasService
{

    /**
     * @var CanvasRepository
     */
    protected $repository;

    /**
     * CanvasService constructor.
     * @param CanvasRepository $repository
     */
    public function __construct(CanvasRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 
     *
     * @param string $url
     * @param string $token
     * @return CanvasRepository
     * @throws Exception
     */
    public function buscaInfoSiteCanvas($url, $token)
    {
        $this->repository->setAvaCanvas($url, $token);
        $siteInfo = $this->verificaErro($this->repository->getSiteInfo());
        if(!$siteInfo instanceof Exception) {
            if(empty($siteInfo[0])) {
                return new Exception('Não foi possível consultar as informações do AVA.');
            }
        }

        return $siteInfo;
    }

    /**
     * Registra log com erro caso a API retorne exception ou nada (podemos add mais verificacoes de erro aqui) 
     * 
     * @param json|false $response
     */
    protected function verificaErro($response)
    {
        if (!$response) {
            return new Exception('Erro na requisição. Tente novamente.');
        } else {
            return $response;
        }
    }
}
