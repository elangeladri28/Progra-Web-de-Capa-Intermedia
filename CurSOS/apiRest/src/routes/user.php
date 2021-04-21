<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/controllers/user.php';
    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/models/user.php';

    $app->post('/addUser', function(Request $request, Response $response){
        if($request->getParam('userName') && $request->getParam('email') && $request->getParam('userPassword') && $request->getParam('firstName') && $request->getParam('lastName')) {
            if($request->getParam('secondName')) {
                $user = new UserModel(null, $request->getParam('email'), $request->getParam('userPassword'), $request->getParam('userName'), 
                $request->getParam('firstName'), $request->getParam('secondName'), $request->getParam('lastName'));
            } else {
                $user = new UserModel(null, $request->getParam('email'), $request->getParam('userPassword'), $request->getParam('userName'), 
                $request->getParam('firstName'), null, $request->getParam('lastName'));
            }

            UserController::addUser($user);

        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
    });

    $app->get('/getUserByEmailPassword', function(Request $request, Response $response){
        if($request->getParam('email') && $request->getParam('userPassword')) {
            $email = $request->getParam('email');
            $password = $request->getParam('userPassword');
            $user = UserController::getUserByEmailPassword($email, $password);
            if($user){
                echo json_encode($user);
            }else{
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." }';
            }
        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
    });

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

    $app->get('/getAllUsers', function(Request $request, Response $response){
        $users = UserController::getAllUsers();
        if($users != null) {
            echo json_encode($users);
            //echo '{"message" : { "status": "200" , "text": "Satisfactory process" }';
        } else {
            echo '{"message" : { "status": "500" , "text": "Sin usuarios registrados." }';
        }
    });

?>