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
?>