<?php
include('reservas-funciones.php');
if (isset($_POST['estacion'])) {

	$idEstacionamiento = addslashes(htmlspecialchars($_POST['estacion']));
	echo "Direccion: ".mostrar_direccion($idEstacionamiento);
}


?>