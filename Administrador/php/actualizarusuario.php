<?php 
include_once('php/funciones.php');
$id_usuario = $_POST['id'];
$usuario = $_POST['Usuario'];
$contraseña = $_POST['Contrasenia'];

consulta("UPDATE usuarios SET nombre_usuario= '$usuario', pass ='$contraseña' WHERE id_usuario = '$id_usuario'")

?>
<SCRIPT LANGUAGE="javascript"> 
 alert("Usuario Actualizada"); 
 </SCRIPT> 
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=tables.php">
