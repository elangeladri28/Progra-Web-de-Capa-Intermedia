<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class CursoController
{

    public static function getCursos($iduser)
    {

        $sql = "Select * FROM LosCursos WHERE usuid = " . $iduser . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $cursos = array();
                while ($curso = $result->fetch_assoc()) {
                    $cursos[] = $curso;
                }
                return $cursos;
            } else {

                return json_encode("No existen Cursos en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function getInfoCurso($idcurso)
    {

        $sql = "Select * FROM LosCursos WHERE id_curso = " . $idcurso . ";";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $curso = $result->fetch_assoc();
                return $curso;
            } else {

                return json_encode("No existe el Curso en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    public static function get3CursosRecientes()
    {

        $sql = "Select * FROM LosCursos ORDER BY fechaCreado ASC LIMIT 3;";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $cursos = array();
                while ($curso = $result->fetch_assoc()) {
                    $cursos[] = $curso;
                }
                return $cursos;
            } else {

                return json_encode("No existen los Cursos en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function addCurso($elcurso)
    {
        $nombre = $elcurso->getnombre();
        $descripcion = $elcurso->getdescripcion();
        $costo = $elcurso->getcosto();
        $foto = $elcurso->getfoto();
        $video = $elcurso->getvideo();
        $categoriaid = $elcurso->getcategoriaid();
        $usuid = $elcurso->getusuid();

        $sql = "INSERT INTO `cursos`.`curso`(`nombre`,`descripcion`,`costo`,`foto`,`video`,`categoriaid`,`usuid`)
        VALUES('" . $nombre . "','" . $descripcion . "'," . $costo . ",'" . $foto . "','" . $video . "'," . $categoriaid . "," . $usuid . ");";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Curso agregado satisfactoriamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
