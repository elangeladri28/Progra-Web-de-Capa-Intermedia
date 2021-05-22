<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/categories.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/categories.php';

//Busca las categorias existentes
$app->post('/getCategorias', function (Request $request, Response $response) {

    $categories = CategoriesController::getCategorias();
    if ($categories != null) {
        echo json_encode($categories);
    }else {

        return json_encode("");
    }
});
// Agrega una nueva categoria
$app->post('/addCategoria', function (Request $request, Response $response) {
    if ($request->getParam('categoria') && $request->getParam('descripcion')) {
        $laCategoria = new CategoriesModel(null, $request->getParam('categoria'), $request->getParam('descripcion'), null);
        CategoriesController::addCategoria($laCategoria);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>