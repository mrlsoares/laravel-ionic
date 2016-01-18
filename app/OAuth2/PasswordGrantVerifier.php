<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 15/01/16
 * Time: 19:31
 */

namespace Entrega\OAuth2;


use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}