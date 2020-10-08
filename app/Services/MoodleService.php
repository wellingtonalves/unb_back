<?php

namespace App\Services;

use App\Repositories\MoodleRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class MoodleService
{

    /**
     * @var MoodleRepository
     */
    protected $repository;

    /**
     * MoodleService constructor.
     * @param MoodleRepository $repository
     */
    public function __construct(MoodleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 
     *
     * @param string $url
     * @param string $token
     * @return MoodleRepository
     * @throws Exception
     */
    public function buscaInfoSiteMoodle($url, $token)
    {
        $this->repository->setAva($url, $token);
        $siteInfo = $this->verificaErro($this->repository->getSiteInfo());
        if(empty($siteInfo->sitename)) {
            return new Exception('Não foi possível consultar as informações do AVA.');
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
        } elseif (isset($response->exception)) {
            // O valor pode mudar dependendo se o debug do AVA estiver ativado ou nao
            $erro = $response->debuginfo ?? $response->message;
            Log::info('(exception-servicoMoodle)Erro no servico do Moodle: ' . $erro);
            return new Exception('Erro na API. Tente novamente.');
        } else {
            return $response;
        }
    }
}
