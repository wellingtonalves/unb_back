<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

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
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
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
            $data = $this->repository->with($this->repository->relationships)->find($id);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
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
            $data = $this->repository->create($request->all());
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
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
            $data = $this->repository->update($request->all(), $id);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
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
            return Response::custom('success_operation');
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
