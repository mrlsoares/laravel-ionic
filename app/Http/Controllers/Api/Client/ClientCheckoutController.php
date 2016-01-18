<?php

namespace Entrega\Http\Controllers\Api\Client;

use Entrega\Http\Requests\AdminCategoyRequest;
use Entrega\Repositories\CategoryRepository;
use Entrega\Repositories\OrderRepository;
use Entrega\Repositories\ProductRepository;
use Entrega\Repositories\UserRepository;
use Entrega\Services\OrderService;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{

    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(OrderRepository $repository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }
   public function index()
   {
       $id=Authorizer::getResourceOwnerId();
       $clienteId=$this->userRepository->find($id)->client->id;
//dd($clienteId);
       $orders = $this->repository->with(['items'])->scopeQuery(function($query)use($clienteId){
            return $query->where('client_id','=',$clienteId);
       })->paginate();

       return $orders;
   }
    public function show($id)
    {
        $order =$this->repository->with(['items','client','cupom'])->find($id);
        $order->items->each(function($item){
            $item->product;
        });
        return $order;
    }

    public function store(Request $request)
    {
        $id=Authorizer::getResourceOwnerId();
        $dados=$request->all();
        $clienteId=$this->userRepository->find($id)->client->id;
        $dados['client_id']=$clienteId;
       $o= $this->service->store($dados);
        $pedido=$this->repository->with('items')->find($o->id);
      return  $pedido;
    }

    public function update(AdminCategoyRequest $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('customer.order.index');
    }


}
