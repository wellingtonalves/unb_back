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
        $this->authorize('index', $this->model);
        return $this->service->all();
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
        $this->authorize('show', $this->model);
        return $this->service->find($uuid);
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
        $this->authorize('store', $this->model);
        return $this->service->create($request);
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
        $this->authorize('update', $this->model);
        return $this->service->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $this->authorize('destroy', $this->model);
        return $this->service->destroy($id);
    }
}
