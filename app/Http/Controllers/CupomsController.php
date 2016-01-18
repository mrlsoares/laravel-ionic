<?php

namespace Entrega\Http\Controllers;


use Entrega\Http\Requests\AdminCupomRequest;
use Entrega\Repositories\CupomRepository;

use Entrega\Http\Requests;


class CupomsController extends Controller
{
    /**
     * @var cupomRepository
     */
    private $repository;

    /**
     * @param cupomRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }
   public function index()
   {
       $cupoms = $this->repository->paginate();
       return view('admin.cupoms.index',compact('cupoms'));
   }
    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {
        $dados=$request->all();
        $this->repository->create($dados);
      return  redirect()->route('admin.cupoms.index');
       // $cupoms = $repository->paginate(5);
       // return view('admin.cupoms.index',compact('cupoms'));
    }
    public function edit($id)
    {
        $cupom=$this->repository->find($id);
        return view('admin.cupoms.edit',compact('cupom'));

    }
    public function update(AdminCupomRequest $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('admin.cupoms.index');
    }
    public function destroy($id)
    {
        $this->repository->delete($id);
        return  redirect()->route('admin.cupoms.index');
    }

}
