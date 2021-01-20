<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class InscricaoAlunoException extends \Exception
{
    public function __construct()
    {
        throw new HttpResponseException(new Response([
            'message' => 'Atenção, o parâmetro enviado não está correto.',
            'errors' => [],
            'messageType' => __('messages.message_type.erro')
        ], Response::HTTP_BAD_REQUEST));
    }
}
