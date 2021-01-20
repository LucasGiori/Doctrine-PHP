<?php

namespace App\App;

use Exception;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;
use App\Util\SerializerUtil;

require_once __DIR__ . "/../../vendor/autoload.php";
require __DIR__.'/../../config/doctrine.php';

$dotenv = new Dotenv();
if (!file_exists(__DIR__ . '/../../.env')){
    throw new Exception('Arquivo .env não encontrado');
}
$dotenv->load(__DIR__ . '/../../.env');

$containerBuilder = new ContainerBuilder();

// definindo as configuracoes no container
$settings = require __DIR__ . '/../../config/settings.php';
$containerBuilder->addDefinitions($settings);

$container = $containerBuilder->build();

// Definindo funções que ficarão disponíveis no container;

$entityManager = getEntityManager($container);
$container->set('em', $entityManager);
$container->set('serializer',function(){
    return new SerializerUtil();
});

$app = AppFactory::createFromContainer($container);

//require_once __DIR__ . '/Repositories.php';
require_once __DIR__ . '/Routes.php';