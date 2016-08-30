<?php

namespace Entrega\Http\Controllers\Api\Client;

use Entrega\Http\Controllers\Controller;
use Entrega\Repositories\ProductRepository;



class ClientProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;


    /**
     * ClientProductController constructor.
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
   public function index()
   {
     $products =$this->repository->skipPresenter(false)->all();
     return $products;
   }





}
