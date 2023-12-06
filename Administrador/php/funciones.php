<?php
require('conexion.php'); //Archivo que contiene la conexion a la bd

//funcion para realizar consultas y devolver una matriz con los datos
function consulta($consulta) {
	try {
		conectarBD();

		$manejadordb = $GLOBALS['conexion']->prepare($consulta);
		$manejadordb->execute();
		$matrizalerta = $manejadordb->fetchall();
		return $matrizalerta;
	} catch(PDOException $error) {
		echo "Error de base de datos: </br>", $error->getMessage(); 
	}
}

//funcion para insertar datos a partir de una consulta
function guardarDatos($querty){
	try {
		conectarBD();

		$manejadordb = $GLOBALS['conexion']->prepare($querty);
		$manejadordb->execute();
		return "Datos agregados correctamente";
	} catch(PDOException $error) {
		echo "Error de base de datos: </br>".$error->getMessage();
	}
	desconectarBD();

}

	



	

/* Para insertar:
"INSERT INTO tabla(campoA, campoB) VALUES(".$numero.", '".$texto."');";

Para hacer un update:
"UPDATE tabla SET campoA = ".$numero.", campoB = '".$texto."' WHERE id_tabla = ".$id.";
*/
?>
