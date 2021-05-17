<?php 

$foto=$_FILES["foto"]["name"];

if($video) {
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="../imagenes/Cursos".$foto;
    move_uploaded_file($ruta, $destino);
}

?>