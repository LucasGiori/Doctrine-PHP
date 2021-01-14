<?php

declare(strict_types=1);

namespace App\Handler\Usuario;


use Exception;
use App\Entity\{Usuario,TipoUsuario};
use App\Repository\Usuario as UserRepository;
//use App\Database\Connection;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;


final class GetUserById
{
    
    public function __construct(
        private $userRepository,
        $user
    )
    {
        $this->userRepository = $user;
    }

    public function getUserById(ServerRequestInterface $request, ResponseInterface $response,$args):ResponseInterface
    {
        try{
            $response->getBody()->write($this->serializer->serialize(['status'=>'Deu Certo!'],'json'));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_OK);
        }catch(Exception $e){
            $response->getBody()->write($this->serializer->serialize(['message'=>$e->getMessage()],'json'));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
    // public function __invoke(ServerRequestInterface $request, ResponseInterface $response,$args) : ResponseInterface
    // {   
    //     try{
    //         //$entityManager = $entityManager->get('em');
    //         // $desenvolvedorRepository =  new DesenvolvedorRepository(new Connection());
    //         // $desenvolvedorService = new DesenvolvedorService($desenvolvedorRepository);                
    //         // $desenvolvedor = $desenvolvedorService->getById((int)$args['id']);
    //         $response->getBody()->write($this->serializer->serialize(['status'=>'Deu Certo!'],'json'));
    //         return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_OK);
    //     }catch(Exception $e){
    //         $response->getBody()->write($this->serializer->serialize(['message'=>$e->getMessage()],'json'));
    //         return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
    //     }
    // }
}