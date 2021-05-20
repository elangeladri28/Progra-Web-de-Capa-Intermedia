<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class CarritoController
{

    public static function getCarritoPersona($iduser)
    {
        $sql = "Select * from LosCursosCarrito Where usuarioid = " . $iduser . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $carritos = array();
                while ($carrito = $result->fetch_assoc()) {
                    $carritos[] = $carrito;
                }
                return $carritos;
            } else {

                return json_encode("No existen Chats en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function getRevisaCarrito($losDatos)
    {

        $cursoid = $losDatos->getcursoid();
        $usuarioid = $losDatos->getusuarioid();
        $sql = "Select * from ElCarrito Where usuarioid = " . $usuarioid . " and cursoid = " . $cursoid . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {

                $carrito = $result->fetch_assoc();

                return $carrito;
            } else {

                return json_encode("No esta el curso en el carrito.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function EliminaCursoCarro($losDatos)
    {
        $id_carrito = $losDatos->getid_carrito();
        $sql = "Delete from Carrito where id_carrito = " . $id_carrito . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Eliminado del carro exitosamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function addCarrito($CarritoInfo)
    {
        $cursoid = $CarritoInfo->getcursoid();
        $usuarioid = $CarritoInfo->getusuarioid();

        $sql = "INSERT INTO `cursos`.`carrito`(`id_carrito`,`cursoid`,`usuarioid`)VALUES(null," . $cursoid . "," . $usuarioid . ");";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Agregado al carrito exitosamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
