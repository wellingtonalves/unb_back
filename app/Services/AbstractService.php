<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class AbstractService
{
    /**
     * @var AbstractRepository
     */
    protected $repository;

    /**
     * Returns a paginated list of Model.
     *
     * @return mixed
     */
    public function all()
    {
        try {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $data = $this->repository->with($this->repository->relationships);
            $perPage = request()->has('per_page') ? request()->per_page : null;
            return request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao listar. Tente novamente.');
        }
    }

    /**
     * Data of a Model by primary key
     *
     * @param int|string $id
     *
     * @return mixed
     * @throws Exception
     */
    public function find($id)
    {
        try {
            return $this->repository->with($this->repository->relationships)->find($id);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao detalhar. Tente novamente.');
        }
    }

    /**
     * Store a newly created Model in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        try {
            return $this->repository->create($request->all());
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao criar. Tente novamente.');
        }
    }

    /**
     * Update the specified Model in storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        try {
            $this->repository->find($id)->update($request->all());
            return 'Registro atualizado com sucesso.';
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao atualizar. Tente novamente.');
        }
    }

    /**
     * Remove the specified Model from storage.
     *
     * @param int|string $id
     *
     * @return null
     * @throws Exception
     */
    public function destroy($id)
    {
        try {
            $this->repository->find($id)->delete();
            return 'Registro excluído com sucesso.';
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao excluir. Tente novamente.');
        }
    }
}
