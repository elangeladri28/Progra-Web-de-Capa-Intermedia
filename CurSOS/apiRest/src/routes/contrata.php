<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/contrata.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/contrata.php';

//Busca si el curso ya esta contratado
$app->post('/RevisaEstaContratado', function (Request $request, Response $response) {
    if($request->getParam('cursoid') && $request->getParam('usuarioid')){
        $losDatos = new ContrataModel(null, $request->getParam('usuarioid'), $request->getParam('cursoid'),null,null,null);
        $respuesta = ContrataController::RevisaEstaContratado($losDatos);
        if ($respuesta != null) {
            echo json_encode($respuesta);
        }else {
            return json_encode("");
        }
    }

});

//Busca si el curso ya esta contratado
$app->post('/RevisaSiYaTienesLasLecciones', function (Request $request, Response $response) {
    if($request->getParam('cursoid') && $request->getParam('usuarioid')){
        $losDatos = new ContrataModel(null, $request->getParam('usuarioid'), $request->getParam('cursoid'),null,null,null);
        $respuesta = ContrataController::RevisaSiYaTienesLasLecciones($losDatos);
        if ($respuesta != null) {
            echo json_encode($respuesta);
        }else {
            return json_encode("");
        }
    }
});

//Busca si el curso ya esta contratado
$app->post('/aumentaSuProgreso', function (Request $request, Response $response) {
    if($request->getParam('cursoid') && $request->getParam('usuarioid')){
        $losDatos = new ContrataModel(null, $request->getParam('usuarioid'), $request->getParam('cursoid'),null,null,null);
        ContrataController::aumentaSuProgreso($losDatos);
        
    }else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
// Agrega el curso al carrito
$app->post('/AgregaContrata', function (Request $request, Response $response) {
    if ($request->getParam('cursoid') && $request->getParam('usuarioid')) {
        $losDatos = new ContrataModel(null, $request->getParam('cursoid'), $request->getParam('usuarioid'),null,null,null);
        ContrataController::addContrata($losDatos);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
