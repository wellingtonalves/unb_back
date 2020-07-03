<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class NaoAutorizadoException extends \Exception
{
    public function __construct()
    {
        throw new HttpResponseException(new Response([
            'message' => __('messages.not_authorized'),
            'errors' => __('messages.error_operation')
        ], Response::HTTP_UNAUTHORIZED));
    }
}
