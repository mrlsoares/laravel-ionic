<?php

namespace Entrega\Http\Controllers;

use Entrega\Repositories\OrderRepository;
use Entrega\Repositories\UserRepository;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;

    public function __construct(OrderRepository $repository)
    {

        $this->repository = $repository;
    }
    public function index()
    {
        $orders= $this->repository->paginate();
        //dd($orders);
        return view('admin.orders.index', compact('orders'));
    }
    public function edit($id, UserRepository $userRepository)
    {
        $lists_status=[0=>'Pendente',1=>'A Caminho',2=>'Entregue',3=>'Cancelado'];
        $deliveryman=$userRepository->getDeliverymen();
        $order=$this->repository->find($id);
        return view('admin.orders.edit',compact('order','lists_status','deliveryman'));

    }
    public function update(Request $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('admin.orders.index');
    }
}
