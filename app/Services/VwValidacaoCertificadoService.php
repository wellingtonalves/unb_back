<?php

namespace App\Services;

use App\Repositories\VwValidacaoCertificadoRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;

class VwValidacaoCertificadoService extends AbstractService
{

    /**
     * @var VwValidacaoCertificadoRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param VwValidacaoCertificadoRepository $repository
     */
    public function __construct(VwValidacaoCertificadoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int|string $id
     * @return mixed
     * @throws RepositoryException
     */
    public function find($id)
    {
        try {
            $data = null;
            $possibleConnections = [
                'evg',
                'esaf',
                'sof',
                'spoc',
                'suap'
            ];

            foreach ($possibleConnections as $newConnection) {

                $data = $this->setNewConnection($newConnection)->find($id);

                if ($data !== null) {
                    break;
                }
            }

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @param $connection
     * @return Model
     * @throws RepositoryException
     */
    private function setNewConnection($connection)
    {
        return $this->repository->makeModel()->setConnection($connection);
    }

}
