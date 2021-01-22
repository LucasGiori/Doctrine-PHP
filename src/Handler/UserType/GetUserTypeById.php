<?php

declare(strict_types=1);

namespace App\Handler\UserType;


use Exception;
use App\Entity\User as EntityUser;
use App\Factory\UserType as UserTypeFactory;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;


final class GetUserTypeById
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response,$args):ResponseInterface
    {
        try{
            if(!(int)$args['id']){
                throw new Exception('Argumento inválido!');
            } 

            $usertype = UserTypeFactory::getUserTypeById($this->container->get('em'), (int)$args['id']);
            $usertype = $this->container->get('serializer')->serialize($usertype,'json');
            $response->getBody()->write($usertype);
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_OK);

        }catch(Exception $e){ 
            $response->getBody()->write(json_encode(['message'=>$e->getMessage()]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
}