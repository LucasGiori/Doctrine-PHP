<?php

declare(strict_types=1);

namespace App\App;

use App\Repository\Usuario;

$container->set('usuario_repository', static function ( $container ):Usuario {
    return new Usuario($container->get('em'));
});