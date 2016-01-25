<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 14/01/16
 * Time: 11:01
 */

namespace Entrega\Services;


use Entrega\Repositories\ClientRepository;
use Entrega\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }
    public function update(array $dados,$id)
    {
        $this->clientRepository->update($dados,$id);
        $userId=$this->clientRepository->find($id,['user_id'])->user_id;
        $this->userRepository->update($dados['user'],$userId);
    }
    public function create(array $dados)
    {
        $dados['user']['password']=bcrypt(123456);
        $user=$this->userRepository->create($dados['user']);
        $userId=$user->id;
        $dados['user_id']=$userId;
        $this->clientRepository->create($dados);
    }
}