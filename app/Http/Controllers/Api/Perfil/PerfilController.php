<?php
/**
 * Created by PhpStorm.
 * User: mrlsoares
 * Date: 05/03/16
 * Time: 09:41
 */

namespace Entrega\Http\Controllers\Api\Perfil;


use Entrega\Http\Controllers\Controller;
use Entrega\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class PerfilController extends Controller
{
	/**
	 * @var UserRepository
	 */
	private $repository;

	/**
	 * PerfilController constructor.
	 * @param UserRepository $repository
	 */
	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}
	public function show()
	{
		$id=Authorizer::getResourceOwnerId();
		return $this->repository->find($id);
	}

}