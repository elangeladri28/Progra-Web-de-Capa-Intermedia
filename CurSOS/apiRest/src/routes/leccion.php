<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/leccion.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/leccion.php';

//Busca las lecciones existentes
$app->post('/getLeccionesCurso', function (Request $request, Response $response) {
    $lecciones = LeccionController::getLeccionesCurso($request->getParam('cursoid'));
    if ($lecciones != null) {
        echo json_encode($lecciones);
    }else {
        return json_encode("");
    }
});

//Busca las leccion especifica
$app->post('/getLeccionEspecifica', function (Request $request, Response $response) {
    $leccion = LeccionController::getLeccionEspecifica($request->getParam('leccionid'));
    if ($leccion != null) {
        echo json_encode($leccion);
    }else {
        return json_encode("");
    }
});

// Agrega una nueva leccion
$app->post('/addLeccion', function (Request $request, Response $response) {
    if ($request->getParam('cursoid') && $request->getParam('nombre') && $request->getParam('nivel') && 
    $request->getParam('archivo') && $request->getParam('foto') && 
    $request->getParam('video') && $request->getParam('extra')) {
        $laLeccion = new LeccionModel(null, $request->getParam('nombre'),$request->getParam('cursoid'),
        $request->getParam('nivel'),
        $request->getParam('archivo'), $request->getParam('foto'),
        $request->getParam('video'), $request->getParam('extra'),null, null);
        LeccionController::addLeccion($laLeccion);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>