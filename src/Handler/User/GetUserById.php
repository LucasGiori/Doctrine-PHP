<?php

declare(strict_types=1);

namespace App\Handler\User;


use Exception;
use App\Entity\{Usuario,TipoUsuario};
use App\Repository\Usuario as UserRepository;
use App\Service\User as UserService;
//use App\Database\Connection;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;


final class GetUserById
{


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response,$args):ResponseInterface
    {
        try{
            if(!(int)$args['id']){
                throw new Exception('Argumento inválido!');
            } 
            //$userRepository = new UserRepository("""Injetar o entity Manager""");
            //$userService = new UserService($userRepository);

            $response->getBody()->write(json_encode(['id'=>(int)$args['id']]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_OK);
        }catch(Exception $e){
            $response->getBody()->write(json_encode(['message'=>$e->getMessage()]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
}