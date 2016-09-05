<?php

namespace Entrega\Http\Controllers\Api;

use Entrega\Http\Controllers\Controller;
use Entrega\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
       $this->userRepository=$userRepository;

    }

    public function authenticated()
    {
        $id= Authorizer::getResourceOwnerId();

        return $this->userRepository->skipPresenter(false)->find($id);
    }


}
