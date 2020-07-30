<?php

namespace App\Services;

use App\Exceptions\NaoAutorizadoException;
use App\Helpers\Constants;
use App\Repositories\PessoaRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthService
{
    /**
     * @var UsuarioRepository
     */
    protected $repository;

    /**
     * AuthService constructor.
     * @param UsuarioRepository $repository
     */
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        try {

            $userId = \auth()->guard('api')->id();
            $loggedUser = $this->repository->find($userId);
            return Response::custom('list', $loggedUser, Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::info(_('error_operation'));
            Log::error($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @param $request
     * @return mixed
     * @throws NaoAutorizadoException
     */
    public function login($request)
    {
        $this->verificarPerfil($request);

        try {

            $request = Request::create('/oauth/token', 'POST', [
                'grant_type' => 'password',
                'client_id' => config('services.passport_client.id'),
                'client_secret' => config('services.passport_client.secret'),
                'username' => $request->username,
                'password' => $request->password,
            ]);

            $attempt = app()->handle($request);

            if ($attempt->getStatusCode() !== Response::HTTP_OK) {
                return Response::custom('login_error', $request->get('username'), Response::HTTP_UNAUTHORIZED);
            }

            return Response::custom('list', json_decode($attempt->getContent()), Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::info(_('error_operation'));
            Log::error($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * Por enquanto, o perfil aluno não pode acessar a plataforma.
     *
     * @param $request
     * @throws NaoAutorizadoException
     */
    public function verificarPerfil($request)
    {
        $user = $this->repository->where('tx_login_usuario', '=', $request->username)->first();

        if (!$user) {
            throw new NaoAutorizadoException();
        }

        if ($user->id_perfil == Constants::PERFIS['ALUNO']) {
            throw new NaoAutorizadoException();
        }
    }

    public function logout($request)
    {
        try {

            $revoked = $request->user()->token()->revoke();
            return Response::custom('logout_success', $revoked, Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::info(_('error_operation'));
            Log::error($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
