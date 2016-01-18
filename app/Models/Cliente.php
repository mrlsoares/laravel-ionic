<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 03/01/16
 * Time: 12:19
 */

namespace Entrega\Models;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    protected $fillable=['user_id','fone','endereco','cidade','uf','cep','cpf','cnpj'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}