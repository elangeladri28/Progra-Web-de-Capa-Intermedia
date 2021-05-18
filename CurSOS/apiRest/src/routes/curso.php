<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/curso.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/curso.php';

//Busca las categorias existentes
$app->post('/getCursos', function (Request $request, Response $response) {
    $categories = CategoriesController::getCategorias();
    if ($categories != null) {
        echo json_encode($categories);
    }else {
        return json_encode("No existen Categorias en la BBDD.");
    }
});

// Agrega una nueva categoria
$app->post('/addCurso', function (Request $request, Response $response) {
    if ($request->getParam('nombre') && $request->getParam('descripcion') && 
    $request->getParam('costo') && $request->getParam('foto') && 
    $request->getParam('video') && $request->getParam('categoriaid')) {
        $elCurso = new CursoModel(null, $request->getParam('nombre'), $request->getParam('descripcion'),
        $request->getParam('costo'), $request->getParam('foto'),
        $request->getParam('video'), $request->getParam('categoriaid'),null, null);
        CursoController::addCurso($elCurso);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});
?>