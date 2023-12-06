<?php 
include_once('funciones.php');

Function Generar_Dias(){
	$año_actual = date("Y");
	$mes_actual = date("m");
	$dia_actual = date("d");
	$cantidad_dias_mes = date("t");
	$fecha_hoy = $año_actual."-".$mes_actual."-".$dia_actual;
	$matrizconsulta = consulta("SELECT  apellido, nombre_persona,  nombre_usuario, fecha_reserva, hora_reserva, hora_fin,id_reserva from reservas INNER JOIN personas ON rela_persona = id_persona INNER JOIN usuarios ON usuarios.rela_persona = personas.id_persona WHERE reservas.fecha_reserva ='$fecha_hoy'");
	return $matrizconsulta;

}

Function Generar_Mes(){
	$año_actual = date("Y");
	$mes_actual = date("m");
	$cant_dias_mes = date("t");
	$comienzo_mes = $año_actual."-".$mes_actual."-01";
	$fin_mes = $año_actual."-".$mes_actual."-".$cant_dias_mes;
	
	$matrizconsulta = consulta("SELECT  apellido, nombre_persona,  nombre_usuario, fecha_reserva, hora_reserva, hora_fin, id_reserva from reservas INNER JOIN personas ON rela_persona = id_persona INNER JOIN usuarios ON usuarios.rela_persona = personas.id_persona WHERE reservas.fecha_reserva BETWEEN '$comienzo_mes' AND '$fin_mes' ");
	return $matrizconsulta;
	
}

Function Generar_Anio(){
	$año_actual = date("Y");
	$mes_actual = date("m");
	$cant_dias_mes = date("t");
	$comienzo_año = $año_actual."-01-01";
	$fin_año = $año_actual."-12-31";
	
	$matrizconsulta = consulta("SELECT  apellido, nombre_persona,  nombre_usuario, fecha_reserva, hora_reserva, hora_fin,id_reserva from reservas INNER JOIN personas ON rela_persona = id_persona INNER JOIN usuarios ON usuarios.rela_persona = personas.id_persona WHERE reservas.fecha_reserva BETWEEN '$comienzo_año' AND '$fin_año'");
	return $matrizconsulta;
}
Function Cargar_Usuario(){
	$matrizconsulta = consulta("SELECT nombre_usuario, pass, nombre_persona, apellido,id_persona,id_usuario FROM `usuarios` INNER JOIN personas ON rela_persona = id_persona");
	return $matrizconsulta;
}

Function Contar_Usuarios(){
	$matrizconsulta = consulta("SELECT * FROM usuarios");
	return count($matrizconsulta);
}



function Contar_Reservas($cantidad){
		
		$año_actual = date("Y");
		$mes_actual = date("m");
		$dia_actual = date("d");
		$cant_dias_mes = date("t");
		$fecha_hoy = $año_actual."-".$mes_actual."-".$dia_actual;
		$comienzo_mes = $año_actual."-".$mes_actual."-01";
		$fin_mes = $año_actual."-".$mes_actual."-".$cant_dias_mes;
		$comienzo_año = $año_actual."-01-01";
		$fin_año = $año_actual."-12-31";
		if ($cantidad == 'Dia') {
			$MatrizDias = consulta("SELECT *from reservas WHERE reservas.fecha_reserva ='$fecha_hoy' ");
			return count($MatrizDias);

		}

		elseif ($cantidad == 'Mes') {
			$MatrizMeses = consulta("SELECT *from reservas WHERE reservas.fecha_reserva BETWEEN '$comienzo_mes' AND '$fin_mes' ");
			return count($MatrizMeses);
		}

		elseif ($cantidad == 'Año') {
			$MatrizAños = consulta("SELECT *from reservas WHERE reservas.fecha_reserva BETWEEN '$comienzo_año' AND '$fin_año' ");
			return count($MatrizAños);
		}

		}


		
?>
