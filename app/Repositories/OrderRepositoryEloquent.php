<?php

namespace Entrega\Repositories;

use Entrega\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Entrega\Repositories\OrderRepository;
use Entrega\Models\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace Entrega\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    protected $skipPresenter=true;
    public function getByIdAndDeliveryman($id,$idDeliveryman)
    {
        $result=$this->with(['items','client','cupom'])->findWhere([
            'id'=>$id,
            'user_deliveryman_id'=>$idDeliveryman
        ]);
        if($result instanceof Collection)
        {
            $result=$result->first();
            /*$result->items->each(function($item){
                $item->product;
            });*/
        }
        else
        {
            if(isset($result['data'])&& count($result['data'])==1)
            {
                $result=[
                    'data'=>$result['data'][0]
                ];
            }
            else
            {
                throw new ModelNotFoundException("Pedido não Existe");
            }
        }
        return $result;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function presenter()
    {
        return OrderPresenter::class;
    }
}
