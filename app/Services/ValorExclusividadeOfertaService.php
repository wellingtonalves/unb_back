<?php

namespace App\Services;

use App\Repositories\ValorExclusividadeOfertaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Prettus\Validator\Exceptions\ValidatorException;

class ValorExclusividadeOfertaService extends AbstractService
{

    /**
     * @var ValorExclusividadeOfertaRepository
     */
    protected $repository;

    /**
     * OfertaService constructor.
     * @param ValorExclusividadeOfertaRepository $repository
     */
    public function __construct(ValorExclusividadeOfertaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws ValidatorException
     */
    public function create($request)
    {
        if ($request->has('anexo')) {
            return $this->handleFile($request);
        }

        return parent::create($request);
    }

    /**
     * @param $request
     * @return mixed
     * @throws ValidatorException
     */
    public function handleFile($request)
    {
        $idExclusividadeOferta = $request->input('id_exclusividade_oferta');

        try {

            $file = $request->file('anexo');
            $file = file($file, FILE_IGNORE_NEW_LINES);
            $file = array_filter($file, function($valor) {
                return !is_null($valor) && trim($valor) !== '' && $valor !== 'valores';
            });

            foreach ($file as $value) {
                $data = [
                    'id_exclusividade_oferta' => $idExclusividadeOferta,
                    'valor_exclusividade' => $value
                ];

                $this->repository->create($data);
            }

            return Response::custom('success_operation');
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }

    }
}
