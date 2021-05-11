<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/message.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/message.php';

//Busca los usuarios con lo que has chateado
$app->post('/getPersonasChateas', function (Request $request, Response $response) {
    if ($request->getParam('idusuario')) {
        $mensaje = new MessageModel(null, $request->getParam('idusuario'), null, null);
        $personas = MessageController::getPersonasChateas($mensaje);
        if ($personas != null) {
            echo json_encode($personas);
        } else {
            echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
        }
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
//Busca los mensajes del chat que quieres
$app->post('/getChatEntero', function (Request $request, Response $response) {
    if ($request->getParam('idusuario') && $request->getParam('idusuario2')) {
        $mensaje = new MessageModel(null, $request->getParam('idusuario'), $request->getParam('idusuario2'), null);
        $mensajeschat = MessageController::getChatEntero($mensaje);
        if ($mensajeschat != null) {
            echo json_encode($mensajeschat);
        } else {
            echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
        }
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
//Busca los mensajes del chat que quieres
$app->post('/TraerIDPersonaChateas', function (Request $request, Response $response) {
    if ($request->getParam('username')) {
        
        $mensajeschat = MessageController::TraerIDPersonaChateas($request->getParam('username'));
        if ($mensajeschat != null) {
            echo json_encode($mensajeschat);
        } else {
            echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
        }
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>