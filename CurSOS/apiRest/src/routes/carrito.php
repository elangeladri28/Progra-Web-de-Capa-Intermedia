<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/carrito.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/carrito.php';

//Busca las categorias existentes
$app->post('/getCarritoPersona', function (Request $request, Response $response) {

    $carritos = CarritoController::getCarritoPersona($request->getParam('iduser'));
    if ($carritos != null) {
        echo json_encode($carritos);
    }else {

        return json_encode("");
    }
});
//Busca si el curso ya esta en el carro
$app->post('/getRevisaCarrito', function (Request $request, Response $response) {
    if($request->getParam('cursoid') && $request->getParam('usuarioid')){
        $losDatos = new CarritoModel(null, $request->getParam('cursoid'), $request->getParam('usuarioid'));
        $respuesta = CarritoController::getRevisaCarrito($losDatos);
        if ($respuesta != null) {
            echo json_encode($respuesta);
        }else {
    
            return json_encode("");
        }
    }

});
// Agrega el curso al carrito
$app->post('/addCarrito', function (Request $request, Response $response) {
    if ($request->getParam('cursoid') && $request->getParam('usuarioid')) {
        $losDatos = new CarritoModel(null, $request->getParam('cursoid'), $request->getParam('usuarioid'));
        CarritoController::addCarrito($losDatos);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
// Elimina el curso del carrito
$app->post('/EliminaCursoCarro', function (Request $request, Response $response) {
    if ($request->getParam('id_carrito') ) {
        $losDatos = new CarritoModel( $request->getParam('id_carrito'), null, null);
        CarritoController::EliminaCursoCarro($losDatos);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>