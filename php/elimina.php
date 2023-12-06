<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$patente = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "", "autospace");		
	$sql = $mysqli->query("delete from vehiculos where id_vehiculo='$patente'");	
	echo "eliminado";
	
}

?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../listar.php">