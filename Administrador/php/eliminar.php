<?php 
include_once('php/funciones.php');
$id_reserva = $_GET['id'];

consulta("DELETE FROM reservas WHERE id_reserva = '$id_reserva'")

?>
<SCRIPT LANGUAGE="javascript"> 
 alert("Reserva eliminada"); 
 </SCRIPT> 
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">

 ?>