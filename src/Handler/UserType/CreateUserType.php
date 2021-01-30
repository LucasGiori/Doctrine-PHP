<?php

declare(strict_types=1);

namespace App\Handler\UserType;

use Exception;
use App\Entity\UserType as EntityUserType;
use App\Factory\UserType as UserTypeFactory;
use App\Util\FormToObject;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

final class CreateUserType
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response):ResponseInterface
    {
        try{
            $params = json_decode($request->getBody()->getContents());

            $usertype = FormToObject::createClass((array) $params,(new EntityUserType()));
            
            var_dump(UserTypeFactory::create($this->container->get('em'), $usertype));

            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_OK);
        }catch(Exception $e){ 
            $response->getBody()->write(json_encode(['message'=>$e->getMessage()]));
            return $response->withHeader('Content-Type','application/json')->withStatus(StatusCodeInterface::STATUS_BAD_REQUEST);
        }
    }
}