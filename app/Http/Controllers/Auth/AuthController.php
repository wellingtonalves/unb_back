<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function login(Request $request)
    {
        return $this->service->login($request);
    }

    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }
}
