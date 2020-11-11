<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class VwEmissaoCertificadoException extends \Exception
{
    public function __construct()
    {
        throw new HttpResponseException(new Response([
            'message' => 'Atenção, é necessário enviar como parâmetro id_certificado e tx_origem.',
            'errors' => [],
            'messageType' => __('messages.message_type.erro')
        ], Response::HTTP_BAD_REQUEST));
    }
}
