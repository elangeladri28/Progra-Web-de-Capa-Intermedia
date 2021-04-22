<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/user.php';
    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/user.php';

    //Busca por Correo y contraseña
        $app->post('/getUserByCorreoContra', function(Request $request, Response $response){
            if($request->getParam('correo') && $request->getParam('password')) {
                $correo = $request->getParam('correo');
                $contra = $request->getParam('contra');
                $user = UserController::getUserByCorreoContra($correo, $contra);
                if($user){
                    echo json_encode($user);
                }else{
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." }';
                }
            } else {
                echo '{"message" : { "status": "500" , "text": "Server error" }';
            }
        });
    //Busca por Username
        $app->post('/getUserByUsername', function(Request $request, Response $response){
            if($request->getParam('usuario')) {
                $username = $request->getParam('usuario');
                $user = UserController::getUserByUsername($username);
                if($user) {
                    echo json_encode($user);
                } else {
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." }';
                }
            } else {
                echo '{"message" : { "status": "400" , "text": "Bad Request" }';
            }
        });
    //Busca por ID
        $app->get('/getUserById/{id}', function(Request $request, Response $response){
            if($request->getAttribute('id')) {
                $user = UserController::getUserById($request->getAttribute('id'));
                if($user) {
                    echo json_encode($user);
                } else {
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." }';
                }
            } else {
                echo '{"message" : { "status": "400" , "text": "Bad Request" }';
            }
        });
    //Busca todos los usuarios
        $app->get('/getAllUsers', function(Request $request, Response $response){
            $users = UserController::getAllUsers();
            if($users != null) {
                echo json_encode($users);
                //echo '{"message" : { "status": "200" , "text": "Satisfactory process" }';
            } else {
                echo '{"message" : { "status": "500" , "text": "Sin usuarios registrados." }';
            }
        });
    //Agrega un usuario
    $app->post('/addUser', function(Request $request, Response $response){
        if($request->getParam('rol') && $request->getParam('usuario') && $request->getParam('nombre') && $request->getParam('apellidos') && $request->getParam('correo') && $request->getParam('contra')) {

            $user = new UserModel(null, $request->getParam('rol'), $request->getParam('usuario'), $request->getParam('nombre'), $request->getParam('apellidos'),$request->getParam('correo'),$request->getParam('contra'),null,null);
            UserController::addUser($user);
            

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
    });
    //Modificar un usuario
    $app->post('/modifyUser', function(Request $request, Response $response){

        if($request->getParam('id_usuario') && $request->getParam('rol') && $request->getParam('usuario') && $request->getParam('nombre') && $request->getParam('apellidos') && $request->getParam('correo') && $request->getParam('contra')) {

            $user = new UserModel($request->getParam('id_usuario'), $request->getParam('rol'), $request->getParam('usuario'), $request->getParam('nombre'), $request->getParam('apellidos'),$request->getParam('correo'),$request->getParam('contra'), $request->getParam('avatar'),null);
            UserController::modifyUser($user);

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
        
    });
    //Eliminar un usuario por username
    $app->post('/deleteUserByUsername', function(Request $request, Response $response){

        if($request->getParam('usuario')) {

            $user = new UserModel(null, null, $request->getParam('usuario'), null, null, null, null, null,null);
            UserController::deleteUserByUsername($user);

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
        
    });
        //Eliminar un usuario por id
        $app->post('/deleteUserById', function(Request $request, Response $response){

            if($request->getParam('id_usuario')) {
    
                $user = new UserModel($request->getParam('id_usuario'), null, null, null, null, null, null, null,null);
                UserController::deleteUserById($user);
    
            } else {
                echo '{"message" : { "status": "500" , "text": "Server error" }';
            }
            
        });

?>