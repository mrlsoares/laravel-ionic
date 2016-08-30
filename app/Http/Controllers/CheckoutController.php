<?php

namespace Entrega\Http\Controllers;

use Entrega\Http\Requests\AdminCategoyRequest;
use Entrega\Http\Requests\CheckoutRequest;
use Entrega\Repositories\CategoryRepository;
use Entrega\Repositories\OrderRepository;
use Entrega\Repositories\ProductRepository;
use Entrega\Repositories\UserRepository;
use Entrega\Services\OrderService;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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

    public function __construct(OrderRepository $repository, UserRepository $userRepository, ProductRepository $productRepository,OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }
   public function index()
   {
       //dd(Auth::user()->id);
       $clienteId=$this->userRepository->find(Auth::user()->id)->client->id;
//dd($clienteId);
       $orders = $this->repository->scopeQuery(function($query)use($clienteId){
            return $query->where('client_id','=',$clienteId);
       })->paginate();

       return view('customer.order.index',compact('orders'));
   }
    public function create()
    {
        $products= $this->productRepository->lists();
        //dd($products);
        return view('customer.order.create',compact('products'));
    }

    public function store(CheckoutRequest $request)
    {
        $dados=$request->all();
        $clienteId=$this->userRepository->find(Auth::user()->id)->client->id;
        $dados['client_id']=$clienteId;
        $this->service->store($dados);
        //$this->repository->create($dados);
      return  redirect()->route('customer.order.index');
       // $categories = $repository->paginate(5);
       // return view('admin.categories.index',compact('categories'));
    }
    public function edit($id)
    {
        $order=$this->repository->find($id);
        return view('.edit',compact('order'));

    }
    public function update(CheckoutRequest $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('customer.order.index');
    }
    public function destroy($id)
    {
        $this->repository->delete($id);
        return  redirect()->route('customer.order.index');
    }

}
