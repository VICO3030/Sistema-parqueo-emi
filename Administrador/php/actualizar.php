<?php 
include_once('php/funciones.php');

$id_reserva = $_POST['id'];
$fecha_Reserva = $_POST['Fecha_res'];
$Hora_Reserva = $_POST['Hora_Reserva'];
$Fin_Reserva = $_POST['Fin_Reserva'];

consulta("UPDATE reservas SET hora_reserva= '$Hora_Reserva', hora_fin ='$Fin_Reserva', fecha_reserva = '$fecha_Reserva'  WHERE id_reserva = '$id_reserva'")

?>
<SCRIPT LANGUAGE="javascript"> 
 alert("Reserva Actualizada"); 
 </SCRIPT> 
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
