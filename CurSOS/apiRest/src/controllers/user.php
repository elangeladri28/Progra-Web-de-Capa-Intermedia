<?php

    require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

    class UserController {

        public static function addUser($user) {
            
            $userRol = $user->getRol();
            $Username = $user->getUsuario(); 
            $userNombre = $user->getNombre();
            $userApellido = $user->getApellidos();
            $userCorreo = $user->getCorreo();
            $userContra = $user->getContra();
            
            $sql = "INSERT INTO Usuario(rol, usuario, nombre, apellidos, correo, contra) 
            VALUES ( ".$userRol.",'".$Username."','".$userNombre."','".$userApellido."','".$userCorreo."','".$userContra."')";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);                

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario creado satisfactoriamente." }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }

        }

        public static function modifyUser($user) {
            
            $id_usuario =  $user->getId();
            $userRol = $user->getRol();
            $Username = $user->getUsuario(); 
            $userNombre = $user->getNombre();
            $userApellido = $user->getApellidos();
            $userCorreo = $user->getCorreo();
            $userContra = $user->getContra();
            $userAvatar = $user->getAvatar();
            
            $sql = "UPDATE Usuario SET 
            rol = ".$userRol.",
            usuario = '".$Username."',
            nombre= '".$userNombre."',
            apellidos = '".$userApellido."',
            correo = '".$userCorreo."',
            contra = '".$userContra."',
            avatar = '".$userAvatar."'
            WHERE id_usuario = ".$id_usuario."";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);                

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario modificado satisfactoriamente." }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }
        }
        public static function deleteUserById($user) {
            $UserId = $user->getId(); 
            
            $sql = "UPDATE Usuario SET             
            activo = FALSE
            WHERE id_usuario = '".$UserId."'";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);                

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario eliminado satisfactoriamente." }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }
        }

        public static function deleteUserByUsername($user) {
            $Username = $user->getUsuario(); 
            
            $sql = "UPDATE Usuario SET             
            activo = FALSE
            WHERE usuario = '".$Username."'";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);                

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario eliminado satisfactoriamente." }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }
        }
        
        public static function getUserById($id) {
            $sql = "SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE id_usuario = ".$id." and activo = TRUE";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $users = $result->fetch_assoc()) {
                        return $users;
			        }
                }else {
                    echo json_encode("No existen usuarios en la BBDD.");
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }    
        }

        public static function getUserByUsername($Username) {
            $sql = "SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE Usuario = '".$Username."' and activo = TRUE";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $users = $result->fetch_assoc()) {
                        return $users;
			        }
                }else {
                    echo $sql;
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }    
        }
        public static function getUserByEmailPassword($correo, $contra) {
            $sql = "SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE correo = '".$correo."' and contra = '".$contra."' and activo = TRUE";
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $users = $result->fetch_assoc()) {
                        return $users;
			        }
                }else {
                    echo $sql;
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }    
        }        

        public static function getAllUsers() {
            $sql = "SELECT * FROM Usuario WHERE activo = TRUE";
    
            try{
                $db = new db();
                $db = $db->connectionDB();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $user = $result->fetch_assoc()) {
				        $users[] = $user;
			        }			
			        return $users;
                }else {
                    echo json_encode("No existen usuarios en la BBDD.");
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }
        }
    }

?>