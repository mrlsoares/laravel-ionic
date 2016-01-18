<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 03/01/16
 * Time: 12:19
 */

namespace Entrega\Models;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    protected $fillable=['nome'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}