<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\NaoAutorizadoException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @var AuthService
     */
    protected $service;

    /**
     * AuthController constructor.
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->service->user();
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     * @throws NaoAutorizadoException
     */
    public function login(LoginRequest $request)
    {
        return $this->service->login($request);
    }

    /**
     * @param Request $request
     */
    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }
}
