<?php

namespace Entrega\Http\Controllers\Api\Deliveryman;


use Entrega\Repositories\OrderRepository;

use Entrega\Repositories\UserRepository;
use Entrega\Services\OrderService;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{

    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var OrderService
     */
    private $service;

    public function __construct(OrderRepository $repository,
                                UserRepository $userRepository,
                                OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;

        $this->service = $service;
    }
   public function index()
   {
       $id=Authorizer::getResourceOwnerId();
       $orders = $this->repository->with(['items'])->scopeQuery(function($query)use($id){
            return $query->where('user_deliveryman_id','=',$id);
       })->paginate();

       return $orders;
   }
    public function show($id)
    {
        $idDeliveryman=Authorizer::getResourceOwnerId();
        return $this->repository->getByIdAndDeliveryman($id,$idDeliveryman);
    }



    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman=Authorizer::getResourceOwnerId();
        $order=$this->service->updateStatus($id,$idDeliveryman,$request->get('status'));
        if($order)
        {
            return  $order;
        }
        return abort(400,"Pedido Não Encontrado!");

    }


}
