<?php

     require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

    class MessageController {

        public static function getPersonasChateas($chat) {
            $idusuario = $chat->getidusuario();
            $sql = "CALL `cursos`.`getPersonasChateas`(".$idusuario.");";
    
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $personas = array();
			        while( $persona = $result->fetch_assoc()) {
				        $personas[] = $persona;
			        }			
			        return $personas;
                }else {
                    
                    return json_encode("No existen Chats en la BBDD.");;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}}';
            }
        }
    }
