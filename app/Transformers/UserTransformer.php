<?php

namespace Entrega\Transformers;

use League\Fractal\TransformerAbstract;
use Entrega\Models\User;

/**
 * Class UserTransformer
 * @package namespace Entrega\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    protected  $availableIncludes=['client'];

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'           => (int) $model->id,
            'email'        =>  $model->email,
            'name'         =>  $model->name,
            'role'         =>  $model->role,
        ];
    }
    public function includeClient(User $model)
    {
        return $this->item($model->client, new ClientTransformer());
    }
}
