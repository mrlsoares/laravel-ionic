<?php

namespace Entrega\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Entrega\Repositories\UserRepository;
use Entrega\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace Entrega\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function getDeliverymen()
    {
        return $this->model->where(['role'=>'deliveryman'])->lists('name','id');
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
