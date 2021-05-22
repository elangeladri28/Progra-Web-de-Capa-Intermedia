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
    
    public static function getCursoVentas($idcurso)
    {

        $sql = "CALL `cursos`.`getCursoVentas`(" . $idcurso . ");";
        
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
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    
    public static function TraerCursosDeCategoria($idcategoria)
    {

        $sql = "Select * FROM LosCursos WHERE categoriaid = " . $idcategoria . ";";

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

                return json_encode("");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
    
    public static function LosCursosBuscados($nombre)
    {

        $sql = "Select * FROM LosCursosBuscados WHERE nombre like '%" . $nombre . "%';";
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
    public static function HistorialDeCursos($UsuarioIDHistorial)
    {

        $sql = "Select * FROM HistorialDeCursos WHERE usuarioid = " . $UsuarioIDHistorial . ";";

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
    public static function get3CursosMasVendidos()
    {

        $sql = "Select id_curso, nombre, descripcion,foto, ContadorContratados(id_curso) as Contador from Curso Order by Contador DESC LIMIT 3";

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

    public static function get3CursosRecientes()
    {

        $sql = "Select * FROM LosCursos ORDER BY fechaCreado DESC LIMIT 3;";

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
