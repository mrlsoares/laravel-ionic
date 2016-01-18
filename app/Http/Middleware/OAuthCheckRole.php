<?php

namespace Entrega\Http\Middleware;

use Closure;
use Entrega\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
       $id=Authorizer::getResourceOwnerId();
       $user= $this->userRepository->find($id);
       // dd($user->role.$role);
        if($user->role !=$role )
        {
            return abort(403,'Acesso Negado! ');
        }

        return $next($request);
    }
}
