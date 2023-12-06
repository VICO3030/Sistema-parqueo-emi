<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "", "autospace");	
	
	$id = $_POST['id'];
	$marca = $_POST['marca'];
	$modelo =  $_POST['modelo'];
	$anio =  $_POST['anio'];	
	$patente =  $_POST['patente'];

	$sql = $mysqli->query("update vehiculos set marca='$marca', modelo='$modelo', anio='$anio', patente='$patente' where id_vehiculo=$id");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../listar.php">


