<!DOCTYPE html>
<html>
<head>
	<title>Reservas</title>
	<link rel="stylesheet" type="text/css" href="../css/formularios.css" media="screen"/>

	<!--funciones para esconder o mostrar un elemento-->
	<script type="text/javascript" src="../js/ocultar.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script>
		$(function () {

		$("#mostrar-dir").click(function() {

		var url = "direccion.php";

		$.ajax({
		type: "POST",
		url: url,
		data: $("#formulario").serialize(),
		success: function(data)
		{
			$("#direccion").html(data);
		}
		});

		return false;

		});

		});

	</script>

</head>
<?php
require('../php/reservas-funciones.php');
?>
<body>
	<div class="formulario">
	<!--Enlace a tabla de horarios disponibles y ocupados-->
	<div id="enlace" style="width: 200px; height: 25px; margin: 0 auto;">
	<a href="../index.php#horarios" target="_parent">Ver horarios disponibles</a></div>
	
	
		<form action="" method="post" id ="formulario">
			<table>
			<tr>
				<td>Estacionamiento: </br></br>&nbsp;</td>
				<td><select name="estacion">
					<?php
					$estacionamientosA = consulta("SELECT id_estacionamiento, direccion_estacionamiento, nombre_estacionamiento, numero_puestos FROM estacionamiento;");
					cargar_combo($estacionamientosA, 'nombre_estacionamiento', 'id_estacionamiento');
			 		?>
				</select>
				<input type="submit" id="mostrar-dir" value="Mostrar Direccion" /></br></br>
				<div id="direccion">&nbsp;</div>
				</td>
			<tr>
			<!--Hora de inicio de la reserva-->
				<td>Hora de Reserva: </td>
				<td><input type="text" name="horareserva" value="<?php echo date('H:i'); ?>""/></td>
			</tr>
			<tr>
				<td>Tipo de permanencia: </td>
				<td><input type="radio" name="tipopermanencia" value="fin" onclick ="mostrar('permanencia');" checked /> Hora de final predeterminada
				<input type="radio" name="tipopermanencia" value="sinfin" onclick ="ocultar('permanencia'); mostrar('dia');" /> Sin hora de final</td>
			</tr>
			</table>
			<table id="permanencia">
			<tr>
			<!--Hora de fin de la reserva-->
				<td>Hora de finalización: </td>
				<td><input type="text" name="horafin"/></td>
			</tr>
			</table>
			<table>
			<tr>
			<!--Seleccionar el tipo de reserva (por dia y reserva diaria por periodo)-->
				<td>Tipo de reserva: </td>
				<td><input type="radio" name="tiporeserva" value ="dia "onclick ="ocultar('periodo'); mostrar('dia');" checked /> S&oacute;lo por el d&iacute;a
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tiporeserva" value="periodo" onclick="mostrar('periodo'); ocultar('dia');" value="periodo" /> Por peri&oacute;do</td> 
			</tr>
		</table>
		<table id="dia">
			<tr>
			<!--Fecha de reserva (Solo si no se selecciona por periodo-->
				<td>Fecha:</td>
				<td> <input type="text" name="fechareserva" value="<?php echo date('Y-m-d'); ?>"/></td>

			</tr>
		</table>
		<table id="periodo" style="display:none;">	<!--Esta seccion aparece solo si seleccionamos por periodo-->
			<tr>
				<td>Seleccionar dias: </td>
				<td>
					<input type="checkbox" name="lunes"/>Lunes &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" name="martes"	/>Martes &nbsp;&nbsp;&nbsp;&nbsp;</br>
					<input type="checkbox" name="miercoles" />Mi&eacute;rcoles &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="jueves" />Jueves &nbsp;&nbsp;&nbsp;&nbsp;</br>
				<input type="checkbox" name="viernes"/>Viernes &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="sabado"/>S&aacute;bado &nbsp;&nbsp;&nbsp;&nbsp;</br>
				<input type="checkbox" name="domingo"/>Domingo &nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		</table>
		<div class="botonera">
		<input type="submit" name="verificar" class="boton" value="Verificar Reserva"/>
		<input type="reset" class="boton" value="Limpiar"/>
		<?php
		if(isset($_POST['verificar'])) {
			validar_reserva();
		}
		?>
		</div>
	</form>
	</div>
</body>
</html>