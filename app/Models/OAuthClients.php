<?php

namespace Entrega\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OAuthClients extends Model implements Transformable
{
    use TransformableTrait;
    protected $table="oauth_clients";

    protected $fillable = ['id','secret','name'];

}
