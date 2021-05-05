<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/user.php';
    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/user.php';

    //Busca por Correo y contraseña
        $app->post('/getUserByUsuarioContra', function(Request $request, Response $response){
            if($request->getParam('usuario') && $request->getParam('contra')) {
                $user = new UserModel(null, null, $request->getParam('usuario'), null, null,null,$request->getParam('contra'),null,null);
                $user = UserController::getUserByUsuarioContra($user);
                if($user){
                    session_start();
                    $_SESSION['id_usuario'] = $user['id_usuario'];
                    $_SESSION['rol'] = $user['rol']; 
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['nombre'] = $user['nombre'];
                    $_SESSION['apellidos'] = $user['apellidos'];
                    $_SESSION['correo'] = $user['correo'];
                    $_SESSION['contra'] = $user['contra'];
                    $_SESSION['avatar'] = $user['avatar'];
                    $_SESSION['activo'] = $user['activo'];  
                    echo json_encode($user);
                }else{
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
                }
            } else {
                echo '{"message" : { "status": "500" , "text": "Server error" } }';
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
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
                }
            } else {
                echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
            }
        });
    //Busca por ID
        $app->get('/getUserById/{id}', function(Request $request, Response $response){
            if($request->getAttribute('id')) {
                $user = UserController::getUserById($request->getAttribute('id'));
                if($user) {
                    echo json_encode($user);
                } else {
                    echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
                }
            } else {
                echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
            }
        });
    //Busca todos los usuarios
        $app->get('/getAllUsers', function(Request $request, Response $response){
            $users = UserController::getAllUsers();
            if($users != null) {
                echo json_encode($users);
                //echo '{"message" : { "status": "200" , "text": "Satisfactory process" }';
            } else {
                echo '{"message" : { "status": "500" , "text": "Sin usuarios registrados." } }';
            }
        });
    //Agrega un usuario
    $app->post('/addUser', function(Request $request, Response $response){
        if($request->getParam('rol') && $request->getParam('usuario') && $request->getParam('nombre') && $request->getParam('apellidos') && $request->getParam('correo') && $request->getParam('contra')) {

            $user = new UserModel(null, $request->getParam('rol'), $request->getParam('usuario'), $request->getParam('nombre'), $request->getParam('apellidos'),$request->getParam('correo'),$request->getParam('contra'),null,null);
            UserController::addUser($user);
            
        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
    });
    //Modificar un usuario
    $app->post('/modifyUserbyUsername', function(Request $request, Response $response){

        if($request->getParam('nombre') && $request->getParam('apellidos') && $request->getParam('correo') && $request->getParam('contra') && $request->getParam('avatar')) {

            $user = new UserModel(null, null, $request->getParam('usuario'), $request->getParam('nombre'), $request->getParam('apellidos'),$request->getParam('correo'),$request->getParam('contra'), $request->getParam('avatar'), null);
            UserController::modifyUserbyUsername($user);

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
        
    });
    //Eliminar un usuario por username
    $app->post('/deleteUserByUsername', function(Request $request, Response $response){

        if($request->getParam('usuario')) {

            $user = new UserModel(null, null, $request->getParam('usuario'), null, null, null, null, null,null);
            UserController::deleteUserByUsername($user);

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
        
    });
    //Eliminar un usuario por id
    $app->post('/deleteUserById', function(Request $request, Response $response){

            if($request->getParam('id_usuario')) {
    
                $user = new UserModel($request->getParam('id_usuario'), null, null, null, null, null, null, null,null);
                UserController::deleteUserById($user);
    
            } else {
                echo '{"message" : { "status": "500" , "text": "Server error" } }';
            }
            
    });

?>