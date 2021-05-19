<?php 

$video=$_FILES["video"]["name"];

if($video) {
    $ruta=$_FILES["video"]["tmp_name"];
    $destino="../videos/Lecciones/".$video;
    move_uploaded_file($ruta, $destino);
    echo $destino;
}

?>