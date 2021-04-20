<?php
	$action = $_POST['action'];
	if ($action == "addUser") 
		addUser();
	else if ($action == "getProducts")
		getProducts();
	else if ($action == "deleteProduct")
		deleteProduct();

	function connect() {
		$databasehost = "localhost";
		$databasename = "cursos";
		$databaseuser = "root";
		$databasepass = "root";

		$mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);
		if ($mysqli->connect_errno) {
			echo "Problema con la conexion a la base de datos";
		}
		return $mysqli;
	}

    //Usuario
    function addUser() {
		$usuario = $_POST["usuario"];
		$correo = $_POST["correo"];
		$contraseña = $_POST["contraseña"];
        //$rol = $_POST["rol"];

		$mysqli = connect();
		
		$result = $mysqli->query("INSERT INTO Usuario(usuario, correo, contra) values('".$usuario."','".$correo."','".$contraseña."');");
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			echo "Todo salio bien";		
		}
		mysqli_close($mysqli);
	}

	function getProducts() {
		$mysqli = connect();

		$result = $mysqli->query("SELECT * FROM product");	
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			// Recorremos los resultados devueltos
			$rows = array();
			while( $r = $result->fetch_assoc()) {
				$rows[] = $r;
			}			
			// Codificamos los resultados a formato JSON y lo enviamos al HTML (Client-Side)
			echo json_encode($rows);
		}	
		mysqli_close($mysqli);
	}

	function deleteProduct() {
		$id = $_POST["id"];

		$mysqli = connect();
		
		$result = $mysqli->query("DELETE FROM product WHERE id_product = ".$id."");
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			echo "Todo salio bien";		
		}
		mysqli_close($mysqli);
	}
?>