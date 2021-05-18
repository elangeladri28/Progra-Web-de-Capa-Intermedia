<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class CursoController
{

    // public static function getCursos()
    // {

    //     $sql = "Select * FROM LasCategorias;";

    //     try {
    //         $db = new db();
    //         $db = $db->connectionDB();
    //         $result = $db->query($sql);

    //         if ($result) {
    //             // Recorremos los resultados devueltos
    //             $categorias = array();
    //             while ($categoria = $result->fetch_assoc()) {
    //                 $categorias[] = $categoria;
    //             }
    //             return $categorias;
    //         } else {

    //             return json_encode("No existen Categorias en la BBDD.");
    //         }

    //         $result = null;
    //         $db = null;
    //     } catch (PDOException $e) {
    //         echo '{"error" : {"text":' . $e->getMessage() . '}}';
    //     }
    // }

    public static function addCurso($elcurso)
    {
        $nombre = $elcurso->getnombre();
        $descripcion = $elcurso->getdescripcion();
        $costo = $elcurso->getcosto();
        $foto = $elcurso->getfoto();
        $video = $elcurso->getvideo();
        $categoriaid = $elcurso->getcategoriaid();

        $sql = "INSERT INTO `cursos`.`curso`(`nombre`,`descripcion`,`costo`,`foto`,`video`,`categoriaid`)
        VALUES('" . $nombre . "','" . $descripcion . "'," . $costo . ",'" . $foto . "','" . $video . "'," . $categoriaid . ");";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Curso Agregada satisfactoriamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
