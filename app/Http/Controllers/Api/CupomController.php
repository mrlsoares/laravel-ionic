<?php

namespace Entrega\Http\Controllers\Api;

use Entrega\Http\Requests\AdminCategoyRequest;
use Entrega\Http\Requests\AdminClientRequest;
use Entrega\Http\Requests\CheckoutRequest;

use Entrega\Repositories\CupomRepository;
use Entrega\Repositories\OrderRepository;
use Entrega\Repositories\ProductRepository;
use Entrega\Repositories\UserRepository;
use Entrega\Services\OrderService;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

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
