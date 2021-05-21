<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require '../vendor/autoload.php';

    // header('Access-Control-Allow-Origin: *');
    
    $app = new \Slim\App;

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
                ->withHeader('Access-Control-Allow-Origin', 'localhost')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });


    //User routes
    require '../src/routes/user.php';

    //Message routes
    require '../src/routes/message.php';

    //Categories routes
    require '../src/routes/categories.php';

    //Course routes
    require '../src/routes/curso.php';

    //Lesson routes
    require '../src/routes/leccion.php';

    //Carrito routes
    require '../src/routes/carrito.php';

    //Contrata routes
    require '../src/routes/contrata.php';

    //Comentario routes
    require '../src/routes/comentariocurso.php';

    // Run app
    $app->run();
?>