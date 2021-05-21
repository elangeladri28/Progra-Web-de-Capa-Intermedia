<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/comentariocurso.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/comentariocurso.php';

//Busca las categorias existentes
$app->post('/getComentarios', function (Request $request, Response $response) {

    $comentarios = ComentarioCursoController::getComentarios($request->getParam('cursoid'));
    if ($comentarios != null) {
        echo json_encode($comentarios);
    }else {

        return json_encode("");
    }
});
// Agrega el curso al carrito
$app->post('/addComentario', function (Request $request, Response $response) {
    if ($request->getParam('cursoid') && $request->getParam('comentario') && $request->getParam('usuid')) {
        $ComentarioData = new ComentarioCursoModel(null, $request->getParam('cursoid'),$request->getParam('comentario'), $request->getParam('usuid'));
        ComentarioCursoController::addComentario($ComentarioData);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
// // Elimina el curso del carrito
// $app->post('/EliminaCursoCarro', function (Request $request, Response $response) {
//     if ($request->getParam('id_carrito') ) {
//         $losDatos = new CarritoModel( $request->getParam('id_carrito'), null, null);
//         CarritoController::EliminaCursoCarro($losDatos);
//     } else {
//         echo '{"message" : { "status": "500" , "text": "Server error" } }';
//     }
// });
?>