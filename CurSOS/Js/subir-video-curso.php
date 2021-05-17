<?php 

$video=$_FILES["video"]["name"];

if($video) {
    $ruta=$_FILES["video"]["tmp_name"];
    $destino="../video/Cursos".$video;
    move_uploaded_file($ruta, $destino);
}

?>