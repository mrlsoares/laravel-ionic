<?php

namespace Entrega\Transformers;

use League\Fractal\TransformerAbstract;
use Entrega\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace Entrega\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
