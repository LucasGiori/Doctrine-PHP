<?php

declare(strict_types=1);

namespace App\Handler\User;

use Exception;
use App\Entity\User as EntityUser;
use App\Entity\UserType as EntityUserType;
use App\Handler\BaseHandler;
use App\Repository\User as UserRepository;
use App\Service\User as UserService;
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
            $user = $this->container->get('serializer')->deserialize(
                $request->getBody()->getContents(),
                EntityUser::class,
                'json'
            );
            
            $user->idusertype = $this->container->get('em')->getRepository(EntityUserType::class);
            var_dump($user);
            $userRepository = new UserRepository($this->container->get('em'));
            $userService = new UserService($userRepository);
            $userService->create($user);
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_CREATED);
        }catch(Exception $e){ 
            $response->getBody()->write(json_encode(['message'=>$e->getMessage()]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
}