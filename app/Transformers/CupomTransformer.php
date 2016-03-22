<?php

namespace Entrega\Transformers;

use League\Fractal\TransformerAbstract;
use Entrega\Models\Cupom;

/**
 * Class CupomTransformer
 * @package namespace Entrega\Transformers;
 */
class CupomTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cupom entity
     * @param \Cupom $model
     *
     * @return array
     */
    public function transform(Cupom $model)
    {
        return [
            'id'         => (int) $model->id,
            'code'         =>  $model->code,
            'value'         =>(float)  $model->value,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
