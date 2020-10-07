<?php

namespace App\Services;

use App\Repositories\AvaRepository;
use App\Services\AbstractService;
use Symfony\Component\HttpFoundation\Request;

class AvaService extends AbstractService
{

    /**
     * @var AvaRepository
     */
    protected $repository;

    /**
     * @var MoodleService
     */
    protected $moodleService;

    /**
     * AvaService constructor.
     * @param AvaRepository $repository
     */
    public function __construct(AvaRepository $repository, MoodleService $moodleService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
    }

    /**
     *
     * @param int $id
     * @return AvaRepository
     * @throws Exception
     */
    public function find($id)
    {
        $ava = parent::find($id);
        $ava->tp_ava = trim($ava->tp_ava);
        
        return $ava;
    }

    /**
     *
     * @param Request $request
     * @return AvaRepository
     * @throws Exception
     */
    public function create(Request $request)
    {
        $ava = parent::create($request);
        $info = $this->moodleService->buscaInfoSiteMoodle($request->tx_url, $request->tx_token);
        dd($info);
        
        return $ava;
    }
}
