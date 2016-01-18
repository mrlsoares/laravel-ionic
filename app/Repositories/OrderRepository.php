<?php

namespace Entrega\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository
 * @package namespace Entrega\Repositories;
 */
interface OrderRepository extends RepositoryInterface
{
    public function getByIdAndDeliveryman($id,$idDeliveryman);
}
