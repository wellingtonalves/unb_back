<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class AbstractController extends Controller
{
    /**
     * @var $service
     */
    protected $service;
    protected $model;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
//        $this->authorize('index', $this->model);
        return Response::custom('list', $this->service->all(), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param $uuid
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function show($uuid)
    {
//        $this->authorize('show', $this->model);
        $data = $this->service->find($uuid);
        return Response::custom('detail', $data, Response::HTTP_OK);
    }

    /**
     * Store.
     *
     * @param $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function save($request)
    {
//        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom('success_operation', $data, Response::HTTP_CREATED);
    }

    /**
     * Store.
     *
     * @param $request
     * @param $id
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function updateAs($request, $id)
    {
//        $this->authorize('update', $this->model);
        $data = $this->service->update($request, $id);
        return Response::custom('success_operation', $data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $uuid
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($uuid)
    {
//        $this->authorize('destroy', $this->model);
        $data = $this->service->destroy($uuid);
        return Response::custom('success_operation', $data, Response::HTTP_OK);
    }
}
