<?php

namespace Entrega\Http\Controllers;

use Entrega\Http\Requests\AdminCategoyRequest;
use Entrega\Http\Requests\AdminProductRequest;
use Entrega\Repositories\CategoryRepository;
use Entrega\Repositories\ProductRepository;
use Illuminate\Http\Request;

use Entrega\Http\Requests;
use Entrega\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param CategoryRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }
   public function index()
   {
       $products = $this->repository->paginate();
       return view('admin.products.index',compact('products'));
   }
    public function create()
    {
        $categories=$this->categoryRepository->lists();
        return view('admin.products.create',compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $dados=$request->all();
        $this->repository->create($dados);
      return  redirect()->route('admin.products.index');
       // $products = $repository->paginate(5);
       // return view('admin.products.index',compact('products'));
    }
    public function edit($id)
    {
        $product=$this->repository->find($id);
        $categories=$this->categoryRepository->lists();
        return view('admin.products.edit',compact('product','categories'));

    }
    public function update(AdminProductRequest $request, $id)
    {
        $dados=$request->all();
        $this->repository->update($dados,$id);
        return  redirect()->route('admin.products.index');
    }
    public function destroy($id)
    {
        $this->repository->delete($id);
        return  redirect()->route('admin.products.index');
    }

}
