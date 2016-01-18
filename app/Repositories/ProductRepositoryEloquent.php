<?php

namespace Entrega\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Entrega\Repositories\ProductRepository;
use Entrega\Models\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace Entrega\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function lists()
    {
        return $this->model->get(['id','name','price']);
    }
}
