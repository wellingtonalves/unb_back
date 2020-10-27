<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class VwCursosRealizadosException extends \Exception
{
    public function __construct()
    {
        throw new HttpResponseException(new Response([
            'message' => 'Atenção, é necessário enviar como parâmetro cpf ou email.',
            'errors' => [],
            'messageType' => __('messages.message_type.erro')
        ], Response::HTTP_BAD_REQUEST));
    }
}
