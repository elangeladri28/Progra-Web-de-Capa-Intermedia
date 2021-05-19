<?php 

$archivo=$_FILES["archivo"]["name"];

if($archivo) {
    $ruta=$_FILES["video"]["tmp_name"];
    $destino="../archivos/Lecciones/".$archivo;
    move_uploaded_file($ruta, $destino);
    echo $destino;
}

?>