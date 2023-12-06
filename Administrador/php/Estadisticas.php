<?php 
include_once('funciones.php');
function Contar_RegistrosxMes($numero){
	$comienzo_mes = [];
	
		for ($i=1; $i < 10 ; $i++) { 
			$comienzo_mes[$i] = '2017-0'.$i.'-01';
		}
		for ($i=10; $i < 13 ; $i++) { 
			$comienzo_mes[$i] = '2017-'.$i.'-01';
		}

		$fin_mes = [];
		$fin_mes[10] = '2017-10-31';
		$fin_mes[12] = '2017-12-31';
		$fin_mes[11] = '2017-11-30';

		for ($i=1; $i < 13; $i++) { 
			switch ($i) {
				case $i == 1 or $i == 3 or $i == 5 or $i == 7 or $i == 8 or $i == 10 or $i == 12:
					$fin_mes[$i] = '2017-0'.$i.'-31';
					break;
				case $i == 2:
					$fin_mes[$i] = '2017-02-28';
					break;
				case $i == 4 or $i == 6 or $i == 9:
					$fin_mes[$i] = '2017-0'.$i.'-30';
					break;	
			}
		}
		$matriz_Consulta = Consulta("SELECT * FROM reservas WHERE reservas.fecha_reserva BETWEEN '$comienzo_mes[$numero]' AND '$fin_mes[$numero]'");
		return count($matriz_Consulta);
 }

	function ReservaxMes(){
	$Matriz_Reservasxmes = [];
		for ($i=1; $i < 13 ; $i++) { 
			$Matriz_Reservasxmes[$i] = Contar_RegistrosxMes($i);
		}


	$json_string = json_encode($Matriz_Reservasxmes);
	print $json_string;
	}

	ReservaxMes();
	
?>
