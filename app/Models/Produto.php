<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 03/01/16
 * Time: 12:19
 */

namespace Entrega\Models;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $fillable=['categoria_id','nome','descricao','preco'];
    public function categoria()
    {
        return $this->belongsTo(Produto::class);
    }

}