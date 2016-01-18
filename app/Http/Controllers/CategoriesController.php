<?php

namespace Entrega\Http\Controllers;

use Entrega\Http\Requests\AdminCategoyRequest;
use Entrega\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * @param CategoryRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
   public function index()
   {
       $categories = $this->repository->paginate();
       return view('admin.categories.index',compact('categories'));
   }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(AdminCategoyRequest $request)
    {
        $dados=$request->all();
        $this->repository->create($dados);
      return  redirect()->route('admin.categories.index');
       // $categories = $repository->paginate(5);
       // return view('admin.categories.index',compact('categories'));
    }
    public function edit($id)
    {
        $category=$this->repository->find($id);
        return view('admin.categories.edit',compact('category'));

    }
    public function update(AdminCategoyRequest $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('admin.categories.index');
    }
    public function destroy($id)
    {
        $this->repository->delete($id);
        return  redirect()->route('admin.categories.index');
    }

}
