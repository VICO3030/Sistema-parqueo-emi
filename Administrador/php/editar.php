<?php  
require_once('funciones.php');
$contraseña = $_POST['Contraseña'];
$usuario = $_POST['Usuario'];
  echo guardarDatos("UPDATE usuarios SET nombre_usuario =".$usuario.", pass= ".$contraseña."WHERE id_usuario =".$_POST['id_usuario']."");


?>
