<?php 
include_once('php/funciones.php');
$id_usuario = $_GET['id'];

consulta("DELETE FROM usuarios WHERE id_usuario = '$id_usuario'")

?>
<SCRIPT LANGUAGE="javascript"> 
 alert("Usuario eliminada"); 
 </SCRIPT> 
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=tables.php">

 ?>