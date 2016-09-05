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
            'user_id'=>(int)  $model->user_id,
            'phone'=> $model->phone,
            'endereco'=> $model->endereco,
            'cidade'=> $model->cidade,
            'uf'=> $model->uf,
            'cep'=> $model->cep,
            'cpf'=> $model->cpf,
            'cnpj'=> $model->cnpj,
            'razao_social'=> $model->razao_social,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
