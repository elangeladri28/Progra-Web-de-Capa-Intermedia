<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/leccion.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/leccion.php';

//Busca las lecciones existentes
$app->post('/getLecciones', function (Request $request, Response $response) {
    $lecciones = LeccionController::getLecciones($request->getParam('cursoid'));
    if ($lecciones != null) {
        echo json_encode($lecciones);
    }else {
        return json_encode("No existen Lecciones en la BBDD.");
    }
});

// Agrega una nueva leccion
$app->post('/addLeccion', function (Request $request, Response $response) {
    if ($request->getParam('cursoid') && $request->getParam('nivel') && 
    $request->getParam('archivo') && $request->getParam('foto') && 
    $request->getParam('video') && $request->getParam('extra')) {
        $laLeccion = new LeccionModel(null, $request->getParam('cursoid'), $request->getParam('nivel'),
        $request->getParam('archivo'), $request->getParam('foto'),
        $request->getParam('video'), $request->getParam('extra'),null, null);
        LeccionController::addLeccion($laLeccion);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>