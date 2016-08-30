<?php

namespace Entrega\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Entrega\Repositories\CupomRepository;
use Entrega\Presenters\CupomPresenter;
use Entrega\Models\Cupom;

/**
 * Class CupomRepositoryEloquent
 * @package namespace Entrega\Repositories;
 */
class CupomRepositoryEloquent extends BaseRepository implements CupomRepository
{
    protected $skipPresenter =true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cupom::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByCode($code)
    {
        $result=$this->model->where('code',$code)
            ->where('used',0)
            ->first();
       //echo $code;
        //dd($result);

        if($result)
        {
            return $this->parserResult($result);
        }
        throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }
    public function presenter()
    {
        return CupomPresenter::class;
    }
}
