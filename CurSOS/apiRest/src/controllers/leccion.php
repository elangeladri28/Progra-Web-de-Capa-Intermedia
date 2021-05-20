<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class LeccionController
{

    public static function getLeccionesCurso($idcurso)
    {

        $sql = "Select * FROM LasLecciones WHERE cursoid = " . $idcurso . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $lecciones = array();
                while ($leccion = $result->fetch_assoc()) {
                    $lecciones[] = $leccion;
                }
                return $lecciones;
            } else {

                return json_encode("No existen Categorias en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getLeccionEspecifica($leccionid)
    {

        $sql = "Select * FROM LasLecciones WHERE id_leccion = " . $leccionid . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                $leccion = $result->fetch_assoc();
                
                return $leccion;
            } else {

                return json_encode("No existe esta leccion en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function addLeccion($laLeccion)
    {
        $nombre = $laLeccion->getnombre();
        $cursoid = $laLeccion->getcursoid();
        $nivel = $laLeccion->getnivel();
        $archivo = $laLeccion->getarchivo();
        $foto = $laLeccion->getfoto();
        $video = $laLeccion->getvideo();
        $extra = $laLeccion->getextra();

        $sql = "INSERT INTO `cursos`.`leccion`(`id_leccion`,`nombre`,`cursoid`,`nivel`,`archivo`,`foto`,`video`,`extra`,`activo`,`fechaCreado`)VALUES(null ,'" . $nombre . "'," . $cursoid . "," . $nivel . ",'" . $archivo . "','" . $foto . "','" . $video . "','" . $extra . "', 1, now());";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Leccion Agregada satisfactoriamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
