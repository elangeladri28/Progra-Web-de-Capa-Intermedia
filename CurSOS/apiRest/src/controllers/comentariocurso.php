<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class ComentarioCursoController
{

    public static function getComentarios($iduser)
    {
        $sql = "Select * from ComentariosDelCurso Where cursoid = " . $iduser . ";";
        
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

    public static function addComentario($ComentarioInfo)
    {
        $cursoid = $ComentarioInfo->getcursoid();
        $usuid = $ComentarioInfo->getusuid();
        $comentario = $ComentarioInfo->getcomentario();

        $sql = "INSERT INTO `cursos`.`comentariocurso`(`id_comencurs`,`cursoid`,`comentario`,`usuid`)VALUES(null ," . $cursoid . ",'" . $comentario . "'," . $usuid . ");";
        
        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Se agrego el comentario exitosamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
