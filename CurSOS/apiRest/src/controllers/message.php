<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class MessageController
{

    public static function getPersonasChateas($chat)
    {
        $idusuario = $chat->getidusuario();
        $sql = "CALL `cursos`.`getPersonasChateas`(" . $idusuario . ");";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $personas = array();
                while ($persona = $result->fetch_assoc()) {
                    $personas[] = $persona;
                }
                return $personas;
            } else {

                return json_encode("No existen Chats en la BBDD.");;
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getChatEntero($chat)
    {
        $idusuario = $chat->getidusuario();
        $idusuario2 = $chat->getidusuario2();
        $sql = "CALL `cursos`.`getChatEntero`(" . $idusuario . "," . $idusuario2 . ");";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $mensajes = array();
                while ($mensaje = $result->fetch_assoc()) {
                    $mensajes[] = $mensaje;
                }
                return $mensajes;
            } else {

                return json_encode("No existen Mensajes en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function TraerIDPersonaChateas($nombreusuario)
    {

        $sql = "Select TraerIDPersonaChateas('" . $nombreusuario . "') as resultado;";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos

                $mensaje = $result->fetch_assoc();

                return $mensaje;
            } else {

                return json_encode("No existen Mensajes en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
