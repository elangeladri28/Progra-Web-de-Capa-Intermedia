<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//require __DIR__ . '/../src/config/db.php';

$app = new \Slim\App;

//GET Todos los clientes
$app->get('/api/clientes', function(Request $request, Response $response){
    $sql = "SELECT * FROM clientes";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }
        else{
            echo json_encode("No existen clientes en la BBDD");
        }
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});

//GET Cliente por id
$app->get('/api/clientes/{id}', function(Request $request, Response $response){
    $id_cliente = $request->getAttribute('id');
    $sql = "SELECT * FROM clientes WHERE id = $id_cliente";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }
        else{
            echo json_encode("No existen clientes en la BBDD");
        }
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});

//GET crear nuevo cliente
$app->post('/api/clientes/nuevo', function(Request $request, Response $response){
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $telefono = $request->getParam('telefono');
    $email = $request->getParam('email');
    $direccion = $request->getParam('direccion');

    $sql = "INSERT INTO clientes(nombre, apellido, telefono, email, direccion) VALUES
            (:nombre, :apellido, :telefono, :email, :direccion)";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':apellido', $apellido);
        $resultado->bindParam(':telefono', $telefono);
        $resultado->bindParam(':email', $email);
        $resultado->bindParam(':direccion', $direccion);

        $resultado->execute();
        echo json_encode("Nuevo cliente guardado");
        
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});
    //PUT modifica un cliente
    $app->put('/api/clientes/modificar/{id}', function(Request $request, Response $response){
    $id_cliente = $request-> getAttribute('id');
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $telefono = $request->getParam('telefono');
    $email = $request->getParam('email');
    $direccion = $request->getParam('direccion');

    $sql = "UPDATE clientes SET 
                nombre = :nombre,
                apellido = :apellido,
                telefono= :telefono,
                email = :email,
                direccion = :direccion
            WHERE id = $id_cliente";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':apellido', $apellido);
        $resultado->bindParam(':telefono', $telefono);
        $resultado->bindParam(':email', $email);
        $resultado->bindParam(':direccion', $direccion);

        $resultado->execute();
        echo json_encode("Cliente modificado");
        
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});
    //DELETE Borra un cliente
    $app->delete('/api/clientes/delete/{id}', function(Request $request, Response $response){
    $id_cliente = $request-> getAttribute('id');

    $sql = "DELETE FROM clientes WHERE id = $id_cliente";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount()>0){
            echo json_encode("Cliente eliminado");
        }else{
            echo json_encode("No existe cliente con este ID");
        }
        
       
        
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});

//GET Todos los clientes
$app->get('/api/sp_clientes', function(Request $request, Response $response){
    $sql = "CALL `get_clientes`();";
    try{
        $db = new db();
        $db = $db->conectionDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }
        else{
            echo json_encode("No existen clientes en la BBDD");
        }
        $resultado = null;
        $bd = null;
    }
    catch(PDOException $e){
        echo '{"error" : {"text" : '.$e->getMessage().'}';
    }
});