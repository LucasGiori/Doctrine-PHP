<?php

declare(strict_types=1);

namespace App\Handler\User;

use Exception;
use App\Entity\User as EntityUser;
use App\Entity\UserType as EntityUserType;
use App\Factory\User as UserFactory;
use App\Util\FormToObject;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

final class CreateUser
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response):ResponseInterface
    {
        try{
            $params = json_decode($request->getBody()->getContents());

            $usertype = $this->container->get('em')->getRepository(EntityUserType::class)->find($params->idusertype);
            $user = new EntityUser();
            $user->setUsertype($usertype);
            $user = FormToObject::createClass((array) $params, $user);
            
            UserFactory::create($this->container->get('em'), $user);
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_CREATED);
        }catch(Exception $e){ 
            $response->getBody()->write(json_encode(['message'=>$e->getMessage()]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
}