<?php

require_once 'C:/xampp/htdocs/Progra-Web-de-Capa-Intermedia/CurSOS/apiRest/src/config/db.php';

class CursoController
{

    public static function getCursos()
    {

        $sql = "Select * FROM LasCategorias;";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if ($result) {
                // Recorremos los resultados devueltos
                $categorias = array();
                while ($categoria = $result->fetch_assoc()) {
                    $categorias[] = $categoria;
                }
                return $categorias;
            } else {

                return json_encode("No existen Categorias en la BBDD.");
            }

            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }

    public static function addCurso($laCategoria)
    {
        $categoria = $laCategoria->getcategoria();
        $decripcion = $laCategoria->getdescripcion();

        $sql = "INSERT INTO `cursos`.`categoria`(`id_categoria`,`categoria`,`descripcion`,`activo`)
        VALUES (null, '".$categoria."','".$decripcion."', 1);";

        try {
            $db = new db();
            $db = $db->connectionDB();
            $result = $db->query($sql);

            if (!$result) {
                echo "Problema al hacer un query: " . $db->error;
            } else {
                echo '{"message" : { "status": "200" , "text": "Categoria Agregada satisfactoriamente."}}';
            }
            $result = null;
            $db = null;
        } catch (PDOException $e) {
            echo '{"error" : {"text":' . $e->getMessage() . '}}';
        }
    }
}
