<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/db.php';

$app = new \Slim\App;

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });


//Ruta clientes
require __DIR__ . '/../src/rutas/clientes.php';
$app->run();