<?php 

require 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

$foto=$_FILES["foto"]["name"];

if($foto) {
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="../../imagenes/".$foto;
    move_uploaded_file($ruta, $destino);

    session_start();

    $id = $_SESSION['id_usuario'];

    if($id) {
        $sql = "UPDATE Usuario SET avatar = '".$destino."' WHERE id_usuario = ".$id.";";
        echo $sql;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);

        if (!$result) {
            echo "Problema al hacer un query: " . $db->error;								
        } else {
                        
            $_SESSION['avatar'] = $destino;
            echo '{"message" : { "status": "200" , "text": "Usuario modificado satisfactoriamente." } }';
        }

        $result = null;
        $db = null;
    }
}

header("location:../php/Perfil.php");
?>