<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class ContrataController
{

    public static function getContrataPersona($iduser)
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
    public static function RevisaEstaContratado($losDatos)
    {

        $cursoid = $losDatos->getcursoid();
        $usuarioid = $losDatos->getusuarioid();
        $sql = "Select RevisaEstaContratado(" . $usuarioid . "," . $cursoid . ") as resultado;";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {

                $respuesta = $result->fetch_assoc();

                return $respuesta;
            } else {

                return json_encode("No esta contratado el curso.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function RevisaSiYaTienesLasLecciones($losDatos)
    {

        $cursoid = $losDatos->getcursoid();
        $usuarioid = $losDatos->getusuarioid();
        $sql = "Select RevisaSiYaTienesLasLecciones(" . $usuarioid . "," . $cursoid . ") as resultado;";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {

                $respuesta = $result->fetch_assoc();

                return $respuesta;
            } else {

                return json_encode("Error");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function aumentaSuProgreso($losDatos)
    {

        $cursoid = $losDatos->getcursoid();
        $usuarioid = $losDatos->getusuarioid();
        $sql = "CALL `cursos`.`aumentaSuProgreso`(" . $usuarioid . "," . $cursoid . ");";
        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Progreso actualizado"}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function addContrata($CarritoInfo)
    {
        $cursoid = $CarritoInfo->getcursoid();
        $usuarioid = $CarritoInfo->getusuarioid();

        $sql = "INSERT INTO `cursos`.`contrata`(`id_contrata`,`usuarioid`,`cursoid`,`calificacioncurso`,`contadorLecciones`,`progreso`)VALUES(null," . $usuarioid . "," . $cursoid . ", null, null,null);";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Curso contratado exitosamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
