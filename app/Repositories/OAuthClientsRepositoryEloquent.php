<?php

namespace Entrega\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Entrega\Repositories\OAuthClientsRepository;
use Entrega\Models\OAuthClients;

/**
 * Class OAuthClientsRepositoryEloquent
 * @package namespace Entrega\Repositories;
 */
class OAuthClientsRepositoryEloquent extends BaseRepository implements OAuthClientsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OAuthClients::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
