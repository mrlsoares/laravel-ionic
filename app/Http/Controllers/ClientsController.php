<?php

namespace Entrega\Http\Controllers;

use Entrega\Http\Requests\AdminClientRequest;
use Entrega\Repositories\ClientRepository;
use Entrega\Services\ClientService;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;

class clientsController extends Controller
{
    private $repository;
    /**
     * @var ClientService
     */
    private $service;


    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
   public function index()
   {
       $clients = $this->repository->paginate();
       return view('admin.clients.index',compact('clients'));
   }
    public function create()
    {
        return view('admin.clients.create');
    }


    public function store(AdminClientRequest $request)
    {
        $dados=$request->all();
        $this->service->create($dados);
      return  redirect()->route('admin.clients.index');
       // $clients = $repository->paginate(5);
       // return view('admin.clients.index',compact('clients'));
    }
    public function edit($id)
    {
        $client=$this->repository->find($id);
        return view('admin.clients.edit',compact('client'));

    }
    public function update(AdminClientRequest $request, $id)
    {
        $dados=$request->all();
        $this->service->update($dados,$id);

        return  redirect()->route('admin.clients.index');
    }
    public function destroy($id)
    {
        $this->repository->delete($id);
        return  redirect()->route('admin.clients.index');
    }

}
