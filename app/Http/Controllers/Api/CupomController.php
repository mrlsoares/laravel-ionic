<?php

namespace Entrega\Http\Controllers\Api;

use Entrega\Http\Controllers\Controller;
use Entrega\Repositories\CupomRepository;

class CupomController extends Controller
{
    private $repository;
    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;

    }

    public function show($code)
    {
        return $this->repository->skipPresenter(false)->findByCode($code);
    }


}
