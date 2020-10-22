<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class MoodleRepository
{
    /**
     * @var AvaRepository
     */
    protected $avaRepository;
    protected $url;
    protected $token;
    public $idAva;

    public function __construct(AvaRepository $avaRepository)
    {
        $this->avaRepository = $avaRepository;
    }

    /**
     * Altera valores de url, token e idAva(se existir)
     *
     * @param string $url
     * @param string $token
     */
    public function setAva($url, $token)
    {
        $this->url = $url;
        $this->token = $token;

        $ava = $this->avaRepository->where('tx_url', '=', $url)->where('tx_token', '=', $token)->get();
        $this->idAva = $ava->isNotEmpty() ? $ava->first()->getKey() : null;
    }

    /**
     * Servico Moodle utilizado na integracao com os ambientes AVA.
     * O retorno deve ser tratado por quem for utilizar esse metodo.
     *
     * @param string $funcao
     * @param array $parametros
     * @param boolean $original Se verdade, nao trata o retorno. Se falso, utiliza json_decode() para retornar
     * @return GuzzleHttp\Client|false
     */
    protected function servicoMoodle($funcao, $parametros, $original = false)
    {
        try {
            $client = env('APP_ENV', 'local') == 'local' ? new Client(['verify' => false ]) : new Client();
            $url = $this->url.'/webservice/rest/server.php?wstoken='.$this->token.'&'
                . 'wsfunction=' . $funcao . '&moodlewsrestformat=json';

            if($original) {
                $res = $client->request('POST', $url, ['headers' => ['User-Agent' => 'Secretaria EVG'], 'form_params' => $parametros]);
                return $res;
            } else {
                $res = $client->request('POST', $url, ['headers' => ['User-Agent' => 'Secretaria EVG'], 'form_params' => $parametros]);
                $retornoTratado = json_decode($res->getBody()->getContents());
                return $retornoTratado;
            }
        } catch (RequestException $ex) {
            Log::notice('(catch-servicoMoodle)Erro no servico do Moodle: ' . $ex->getMessage());
            return false;
        } catch (ClientException $ex) {
            Log::notice('(catch-servicoMoodle)Erro na requisição ao Moodle: ' . $ex->getMessage());
            return false;
        }
    }


    /**
     * Informacoes do AVA
     *
     * @return json|false
     */
    public function getSiteInfo()
    {
        return $this->servicoMoodle("core_webservice_get_site_info", []);
    }
}