<?php

namespace Entrega\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable=['user_id','phone','endereco','cidade','uf','cep','cpf','cnpj'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
