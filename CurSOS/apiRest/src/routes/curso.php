<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/curso.php';
require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/curso.php';

//Busca los cursos existentes
$app->post('/getCursos', function (Request $request, Response $response) {
    $cursos = CursoController::getCursos($request->getParam('iduser'));
    if ($cursos != null) {
        echo json_encode($cursos);
    }else {
        return json_encode("No existen Categorias en la BBDD.");
    }
});

// Agrega una nueva categoria
$app->post('/addCurso', function (Request $request, Response $response) {
    if ($request->getParam('nombre') && $request->getParam('descripcion') && 
    $request->getParam('costo') && $request->getParam('foto') && 
    $request->getParam('video') && $request->getParam('categoriaid') && $request->getParam('usuid')) {
        $elCurso = new CursoModel(null, $request->getParam('nombre'), $request->getParam('descripcion'),
        $request->getParam('costo'), $request->getParam('foto'),
        $request->getParam('video'), $request->getParam('categoriaid'),null, null, $request->getParam('usuid'));
        CursoController::addCurso($elCurso);
    } else {
        echo '{"message" : { "status": "500" , "text": "Server error" } }';
    }
});

//Busca los 3 cursos mas recientes
$app->post('/get3CursosRecientes', function (Request $request, Response $response) {
    $cursos = CursoController::get3CursosRecientes();
    if ($cursos != null) {
        echo json_encode($cursos);
    }else {
        return json_encode("No existen Categorias en la BBDD.");
    }
});

//Busca la informacion del curso solicitado
$app->post('/getInfoCurso', function (Request $request, Response $response) {
    $cursos = CursoController::getInfoCurso($request->getParam('id_curso'));
    if ($cursos != null) {
        echo json_encode($cursos);
    }else {
        return json_encode("No existen Categorias en la BBDD.");
    }
});
?>