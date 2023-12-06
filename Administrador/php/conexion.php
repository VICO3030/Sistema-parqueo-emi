<?php
define('NOMBREDB', 'autospace');	//nombre de la base de datos
$conexion = null; //Variable para la conexión PDO
$usuario = null;
$perfil = null;
//funcion para conexion a la base de datos
function conectarBD() { 
	try {
		$GLOBALS['conexion'] = new PDO('mysql:host=localhost;dbname='.NOMBREDB, 'root', '');
	} catch(PDOException $error) {
		echo "Error de base de datos: </br>", $error->getMessage();
	}
}

//Funcion para destruir la conexion
function desconectarBD() {
	$GLOBALS['conexion'] = null;
}

function guardar_usuario($perfil) {
	$GLOBALS['usuario'] = $_POST['usuario'];
	$GLOBALS['perfil'] = $perfil;
}

function salir_usuario() {
	$GLOBALS['usuario'] = null;
	$GLOBALS['perfil'] = null;
}
?>