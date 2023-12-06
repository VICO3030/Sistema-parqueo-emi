<?php
require('funciones.php');
$FechasSemana = obtener_fechas();//en este array guardo las fechas de la semana vigente segun la fecha actual

//*-------------------------*Funciones de Modulo Horas de reserva*---------------------------*
function cargar_horarios() {
//Funcion que sirve para cargar los horarios en la tabla junto con los valores de ocupado, libre y reservado por horario en cada dia de la semana
	$horaSig = 0;
	for($i = 0; $i < 24; $i++) {
		$hora = $i.":00";
		$horaSig = intval($i + 1);
		$horaFinal = $horaSig.":00";

		if($i % 2 == 0) {
			$barraAlterna = "<tr class='alt'>";
		} else {
			$barraAlterna = "<tr>";
		}

		echo $barraAlterna."<td>".$hora."</td>";
		
		

		foreach($GLOBALS['FechasSemana'] as $dia=>$valor) {
			//Recorro la matriz fechasSemana y le mando un verificar a ese horario
			$matrizEstados = null;
			$matrizEstados = verificar_disponibilidad($hora, $horaFinal, $valor);
			echo "<td><p ".determinar_color("libres", $matrizEstados['libres']).">Libres: ".$matrizEstados['libres']."</p></br>";
			echo "<p ".determinar_color("reservados", $matrizEstados['reservados']).">Reservados: ".$matrizEstados['reservados']."</p></br>";
			echo "<p ".determinar_color("ocupados", $matrizEstados['ocupados']).">Ocupados: ".$matrizEstados['ocupados']."</p></br></td>";
		}
		echo "</tr>";
	}

}

//Funcion que verifica la disponibilidad de puestos y devuelve la cantidad de puestos libres, ocupados y reservados
function verificar_disponibilidad($horareserva, $horafin, $fechaR) {
	if (isset($_POST['estacionamiento'])) {
		$estacionamiento = $_POST['estacionamiento'];
	} elseif (isset($_POST['estacion'])) {
		$estacionamiento = $_POST['estacion'];
	}

	if ($horafin <> null) {
		//si la hora de fin no es nula
	$consulta = "SELECT count(id_reserva) as ocupados, fecha_reserva, hora_reserva, hora_fin, numero_puestos FROM reservas INNER JOIN puestos on ID_puesto = rela_puesto INNER JOIN estacionamiento ON id_estacionamiento = rela_estacionamiento WHERE rela_estacionamiento = ".$estacionamiento." AND fecha_reserva = '".$fechaR."' AND ((hora_reserva <= '".$horareserva."' AND hora_fin >= '".$horareserva."') OR (hora_reserva >= '".$horareserva."' AND hora_fin <= '".$horafin."'));";
	} else {
		//si es nula
		$consulta = "SELECT count(id_reserva) as ocupados, fecha_reserva, hora_reserva, hora_fin, numero_puestos FROM reservas INNER JOIN puestos on ID_puesto = rela_puesto INNER JOIN estacionamiento ON id_estacionamiento = rela_estacionamiento WHERE rela_estacionamiento = ".$estacionamiento." AND fecha_reserva = '".$fechaR."' AND ((hora_reserva <= '".$horareserva."' AND hora_fin >= '".$horareserva."') OR (hora_reserva >= '".$horareserva."' AND hora_fin <= '".$horareserva."'));";
	}

	$matriz = consulta($consulta);
	$matrizEstados['libres'] = null;
	$matrizEstados['reservados'] = null;
	$matrizEstados['ocupados'] = null;
	foreach($matriz as $puestos) {
		if ($matriz <> null) {
			if($puestos['ocupados'] == 0) {
				$matrizEstados['libres'] = $puestos['numero_puestos'];
				$matrizEstados['reservados'] = 0;
			} else {
				$matrizEstados['reservados'] = $puestos['ocupados'];
				$matrizEstados['libres'] = $puestos['numero_puestos'] - $matrizEstados['reservados'];
			}
			
		} else {
			$matrizEstados['libres'] = $puestos['numero_puestos'];
			$matrizEstados['reservados'] = 0;
		}

	}

	$horaActual = date('h:i');	//hora actual

	//formato de hora reserva y hora actual
	$horareserva = strtotime($horareserva);	
	$horaActual = strtotime($horaActual);

	$horaSiguiente = strtotime('+1 hour', $horareserva); //le sumo una hora a la hora de la reserva
	$fechaActual = date('Y-m-d');	//guardo la fecha actual

	if ($fechaActual == $fechaR && $horaActual >= $horareserva && $horaActual <= $horaSiguiente) {
		//Sacamos la cantidad de ocupados en el momento

		$matriz = null;
		$consulta = "SELECT COUNT(ID_Puesto) as cantidad, estado from puestos INNER JOIN estacionamiento on id_estacionamiento = rela_estacionamiento where estado = 1 and id_estacionamiento = ".$estacionamiento.";";
		$matriz = consulta($consulta);
		if ($matriz <> null) {
			$matrizEstados['ocupados'] = $matriz[0]['cantidad'];
			if ($matrizEstados['reservados'] == 0){
				$matrizEstados['libres'] = $matrizEstados['libres'] - $matrizEstados['ocupados'];
			}

		}
	}	else {
		$matrizEstados['ocupados'] = 0;
	}
	return $matrizEstados;
}

//----------------------Obtener las fechas-----------------------------------
function obtener_fechas() {
//funcion para obtener la lista de fechas de la semana
	$fecha_actual = date("Y-m-d");
	$dias = array('lunes','martes','miercoles','jueves','viernes','sabado', 'domingo');
	$fecha = $dias[date('N', strtotime($fecha_actual)) - 1]; //menos 1 porque domingo devuelve 7 y no hay indice 7
	//Declarar array para guardar las fechas de la semana
	$arrayFechas['lunes'] = null;
	$arrayFechas['martes'] = null;
	$arrayFechas['miercoles'] = null;
	$arrayFechas['jueves'] = null;
	$arrayFechas['viernes'] = null;
	$arrayFechas['sabado'] = null;
	$arrayFechas['domingo'] = null;
	echo $arrayFechas['lunes'];
	//asignar fechas
	switch($fecha) {
		case "lunes":
			$arrayFechas['lunes'] = $fecha_actual;
			$arrayFechas['martes'] = sumar_fechas($fecha_actual, 1);
			$arrayFechas['miercoles'] = sumar_fechas($fecha_actual, 2);
			$arrayFechas['jueves'] = sumar_fechas($fecha_actual, 3);
			$arrayFechas['viernes'] = sumar_fechas($fecha_actual, 4);
			$arrayFechas['sabado'] = sumar_fechas($fecha_actual, 5);
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 6);
			break;
		case "martes":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['martes'] = $fecha_actual;
			$arrayFechas['miercoles'] = sumar_fechas($fecha_actual, 1);
			$arrayFechas['jueves'] = sumar_fechas($fecha_actual, 2);
			$arrayFechas['viernes'] = sumar_fechas($fecha_actual, 3);
			$arrayFechas['sabado'] = sumar_fechas($fecha_actual, 4);
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 5);
			break;
		case "miercoles":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 2);
			$arrayFechas['martes'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['miercoles'] = $fecha_actual;
			$arrayFechas['jueves'] = sumar_fechas($fecha_actual, 1);
			$arrayFechas['viernes'] = sumar_fechas($fecha_actual, 2);
			$arrayFechas['sabado'] = sumar_fechas($fecha_actual, 3);
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 4);
			break;
		case "jueves":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 3);
			$arrayFechas['martes'] = restar_fechas($fecha_actual, 2);
			$arrayFechas['miercoles'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['jueves'] = $fecha_actual;
			$arrayFechas['viernes'] = sumar_fechas($fecha_actual, 1);
			$arrayFechas['sabado'] = sumar_fechas($fecha_actual, 2);
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 3);
			break;
		case "viernes":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 4);
			$arrayFechas['martes'] = restar_fechas($fecha_actual, 3);
			$arrayFechas['miercoles'] = restar_fechas($fecha_actual, 2);
			$arrayFechas['jueves'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['viernes'] = $fecha_actual;
			$arrayFechas['sabado'] = sumar_fechas($fecha_actual, 1);
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 2);
			break;
		case "sabado":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 5);
			$arrayFechas['martes'] = restar_fechas($fecha_actual, 4);
			$arrayFechas['miercoles'] = restar_fechas($fecha_actual, 3);
			$arrayFechas['jueves'] = restar_fechas($fecha_actual, 2);
			$arrayFechas['viernes'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['sabado'] = $fecha_actual;
			$arrayFechas['domingo'] = sumar_fechas($fecha_actual, 1);
			break;
		case "domingo":
			$arrayFechas['lunes'] = restar_fechas($fecha_actual, 6);
			$arrayFechas['martes'] = restar_fechas($fecha_actual, 5);
			$arrayFechas['miercoles'] = restar_fechas($fecha_actual, 4);
			$arrayFechas['jueves'] = restar_fechas($fecha_actual, 3);
			$arrayFechas['viernes'] = restar_fechas($fecha_actual, 2);
			$arrayFechas['sabado'] = restar_fechas($fecha_actual, 1);
			$arrayFechas['domingo'] = $fecha_actual;
			break;
	}
	return $arrayFechas;
}



//Funcion para poner las fechas de cada dia en la tabla de horarios de la semana
function asignar_fechas_tabla() {
	$lunes = date_create($GLOBALS['FechasSemana']['lunes']);
	$lunes = date_format($lunes, "d/m");
	$martes = date_create($GLOBALS['FechasSemana']['martes']);
	$martes = date_format($martes, "d/m");
	$miercoles = date_create($GLOBALS['FechasSemana']['miercoles']);
	$miercoles = date_format($miercoles, "d/m");
	$jueves = date_create($GLOBALS['FechasSemana']['jueves']);
	$jueves = date_format($jueves, "d/m");
	$viernes = date_create($GLOBALS['FechasSemana']['viernes']);
	$viernes = date_format($viernes, "d/m");
	$sabado = date_create($GLOBALS['FechasSemana']['sabado']);
	$sabado = date_format($sabado, "d/m");
	$domingo = date_create($GLOBALS['FechasSemana']['domingo']);
	$domingo = date_format($domingo, "d/m");

	echo "<th>Lunes ".$lunes."</th>";
	echo "<th>Martes ".$martes."</th>";
	echo "<th>Miércoles ".$miercoles."</th>";
	echo "<th>Jueves ".$jueves."</th>";
	echo "<th>Viernes ".$viernes."</th>";
	echo "<th>Sábado ".$sabado."</th>";
	echo "<th>Domingo ".$domingo."</th>";
}

//Funcion para colorear los elementos de la tabla de los horarios en la semana
function determinar_color($tipo, $valor) {
	switch($tipo) {
		case "reservados":
			if ($valor > 0) {
				return "style='color: #705816; font-weight: bold;'";
			}
			break;
		case "libres":
			if ($valor > 0) {
				return "style='color: #23B923; font-weight: bold;'";
			}
			break;
		case "ocupados":
		if ($valor > 0) {
				return "style='color: #F94513; font-weight: bold;'";
			}
			break;
	}
} 

//*-------------------------*Funciones de Modulo Reservas*---------------------------*

function puestos_disponibles($fecha, $hora, $horafin) {
//esta funcion es para determinar los puestos disponibles de acuerdo a la fecha, hora reserva y hora fin dados
	if (isset($_POST['estacionamiento'])) {	//Determinamos de que lugar viene la peticion, del modulo horario o el de reservas
		$idestacionamiento = $_POST['estacionamiento'];
	} else {
		$idestacionamiento = $_SESSION['estacionamiento'];
	}

	if($horafin == null) {	//Si esta null la hora fin la seteamos para 3 horas en el futuro estimado (o sea que en 3 hs puede que este libre)
		$horafin = strtotime('+3 hour', strtotime($hora));
		$horafin = date('h:i', $horafin);
	}

	$consulta = "SELECT id_puesto, rela_estacionamiento, numero, estado FROM puestos WHERE id_puesto not in (SELECT id_puesto from puestos INNER JOIN estacionamiento on ID_estacionamiento = rela_estacionamiento INNER JOIN reservas on ID_puesto = rela_puesto where rela_estacionamiento = ".$idestacionamiento." AND fecha_reserva = '".$fecha."' and hora_reserva >= '".$hora."' AND hora_fin >= '".$horafin."') AND rela_estacionamiento =".$idestacionamiento." AND estado = 0 order by numero";
	$disponibles = consulta($consulta);	//Traemos los datos con la consulta dada

	foreach($disponibles as $campo) {	//recorremos los registros traidos y los mostramos en una tabla junto con el boton para seleccionar
		echo "<tr><td><center>".$campo['numero']."</center></td>";
		echo "<td><center><input type='submit' class='btn-puesto' name='puesto' value='".$campo['numero']."'/></center></td></tr>";
	}

}

//funcion para mostrar la direccion de un estacionamiento dado
function mostrar_direccion($idestacionamiento) {
	$consulta = "SELECT direccion_estacionamiento FROM estacionamiento WHERE id_estacionamiento = ".$idestacionamiento.";";
	$direccion = consulta($consulta);
	return $direccion[0]['direccion_estacionamiento'];
}

//Funcion para validar la reserva
function validar_reserva(){
	//Validamos los campos de texto salvo la hora de fin
	if (empty($_POST['estacion'])) {
		msj_script('Seleccione una estacion');
	} elseif(empty($_POST['fechareserva']) or strlen($_POST['fechareserva']) <= 0) {
		msj_script('ingrese una fecha');
	} elseif(validar_fecha($_POST['fechareserva']) == null){
		msj_script('ingrese una fecha con el formato válido año-mes-dia (ejemplo: 2017-05-30)');
	} elseif(empty($_POST['horareserva']) or strlen($_POST['horareserva']) <= 0) {	
		msj_script('ingrese una hora con el formato válido hora:minuto (ejemplo: 21:30)');
	} elseif(!(validar_hora($_POST['horareserva']))){
		msj_script('ingrese una hora con el formato válido hora:minuto (ejemplo: 21:30)');
	} else {
		//Si cumple con las validaciones anteriores, verificamos la disponibilidad del horario ingresado
		$disponibilidad = verificar_disponibilidad($_POST['horareserva'], $_POST['horafin'], $_POST['fechareserva']);
		if($disponibilidad['libres'] > 0) {

			//Si hay una hora de fin la guardamos
			if (!(empty($_POST['horafin'])) && validar_hora($_POST['horafin'])) {
				$horafin = $_POST['horafin'];
			} else {
				$horafin = null;	//Si no hay hora de fin, guardamos en null
			}

			//enviamos los valores mediante el session
			$_SESSION['fechareserva'] = $_POST['fechareserva'];
			$_SESSION['horareserva'] = $_POST['horareserva'];
			$_SESSION['horafin'] = $horafin;
			$_SESSION['estacionamiento'] = $_POST['estacion'];
			
			//redireccionamos hacia la pagina de confirmación de la reserva
			echo "<script type='text/javascript'>top.location.href = 'confirmar-reserva.php';</script>";
		} else {
			msj_script('No hay disponibles puestos desocupados o reservados para el horario dado');
		}

	}
}

function alta_reserva() {
	$id_puesto = $_SESSION['id_puesto'];
	$id_persona = obtener_datos_usuario('id_persona');

	$consulta="INSERT INTO reservas(hora_reserva, tipo_reserva, hora_fin, rela_persona, fecha_reserva, rela_puesto) VALUES('".$_SESSION['horareserva']."', 1, '".$_SESSION['horafin']."', ".$id_persona." ,'".$_SESSION['fechareserva']."', ".$id_puesto.");";
	guardarDatos($consulta);
	msj_script('La reserva ha sido guardada');
}


//-------------------------------------------------------SECCION CONTACTO--------------------------------------------------------------------

function email(){

if (isset($_POST['consulta'])) {
	
	$nombre = $_POST['name'];
	$asunto = $_POST['subject'];
	$mensaje = $_POST['mensaje'];
	$mail = $_POST['email'];

	/*echo $nombre. "ha dicho <br/>".$mensaje;
	if(mail('autospacefsa@gmail.', $nommbre, $asunto, $mail, $mensaje)){
		echo "mail enviado";
	}else{
		echo "mensaje no enviado";
	}
*/
	$consulta = "INSERT INTO consultas(nombre, email, asunto, mensaje) VALUES('".$nombre."', '".$mail."', '".$asunto."', '".$mensaje."');";
	guardarDatos($consulta);
	msj_script('Consulta enviada');

}
}

?>


