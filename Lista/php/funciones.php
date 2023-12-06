<?php
require('conexion.php'); //Archivo que contiene la conexion a la bd

date_default_timezone_set('America/Argentina/Buenos_Aires'); //establece la zona horaria de las funciones hora/fecha

//funcion para realizar consultas y devolver una matriz con los datos
function consulta($consulta) {
	try {
			conectarBD();

		$manejadordb = $GLOBALS['conexion']->prepare($consulta);
		$manejadordb->execute();
		$matrizalerta = $manejadordb->fetchall();
		return $matrizalerta;
	} catch(PDOException $error) {
		echo "Error de base de datos: </br>", $error->getMessage(); 
	}
}

//funcion para insertar datos a partir de una consulta
function guardarDatos($consulta){
	try {
		conectarBD();

		$manejadordb = $GLOBALS['conexion']->prepare($consulta);
		$manejadordb->execute();
		return "Datos agregados correctamente";
	} catch(PDOException $error) {
		echo "Error de base de datos: </br>".$error->getMessage();
	}
	desconectarBD();

}

//funcion para insertar vehiculos
function insertar_vehiculo(){
	if (isset($_POST['marca'])){
		$datos['marca'] = $_POST['marca'];
		$datos['modelo'] = $_POST['modelo'];
		$datos['anio'] = $_POST['anio'];	
		$datos['patente'] = $_POST['patente'];

$consulta="INSERT INTO vehiculos(modelo, marca, anio, patente) VALUES ('".$datos['marca']."','".$datos['modelo']."',".$datos['anio'].",'".$datos['patente']."');";
		guardarDatos($consulta);
	}else{ 
echo "ingrese los datos";
	}
}



/* Para insertar:
"INSERT INTO tabla(campoA, campoB) VALUES(".$numero.", '".$texto."');";

Para hacer un update:
"UPDATE tabla SET campoA = ".$numero.", campoB = '".$texto."' WHERE id_tabla = ".$id.";
*/

//--------------------------Cargar combobox---------------------------------
function cargar_combo($matrizItems, $campo, $id) {
	//Carga un combobox a partir de una matriz de items
	foreach($matrizItems as $registro) {
		echo "<option value='$registro[$id]'>".$registro[$campo]."</option>";
	}
}

function insertar_usuario(){


if (isset($_POST['nombre'])){
		$datos['nombre'] = $_POST['nombre'];
		$datos['usuario'] = $_POST['usuario'];
		$datos['dni'] = $_POST['dni'];
		$datos['telefono'] = $_POST['telefono'];
		$datos['apellido'] = $_POST['apellido'];
		$datos['domicilio'] = $_POST['domicilio'];
		$datos['pass'] = $_POST['pass'];
		
				
		
		$consulta = "INSERT INTO personas (nombre_persona, apellido, dni, domicilio, telefono) VALUES('".$datos['nombre']."', '".$datos['apellido']."', '".$datos['dni']."', '".$datos['domicilio']."', '".$datos['telefono']."');";

		guardarDatos($consulta);

		$consulta = "INSERT INTO usuarios (rela_persona, nombre_usuario, pass, rela_perfil) VALUES(1, '".$datos['usuario']."', '".$datos['pass']."',1);";
		
		guardarDatos($consulta);
}
}

function mostrardatos(){
conectarBD();
		$consulta="SELECT * FROM vehiculos;";

		$manejadordb = $GLOBALS['conexion']->prepare($consulta);
		$manejadordb->execute();
		$matrizalerta2 = $manejadordb->fetchall();

		foreach($matrizalerta2 as $registro) {
		//	
			echo "<tr><td>".$registro['id_vehiculo']."</td>";
			echo "<td>".$registro['marca']."</td>";
			echo "<td>".$registro['modelo']."</td>";
			echo "<td>". $registro['anio'] ."</td>";
			echo "<td>". $registro['patente'] ."</td>";
			echo '<td width=240>';

                echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$registro['id_vehiculo'] ."' data-marca='" .$registro['marca'] ."' data-modelo='" .$registro['modelo'] ."'  data-anio='" .$registro['anio'] ."' data-patente='" .$registro['patente'] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					
                echo ' ';
                echo "<a class='btn btn-danger' href='php/elimina.php?id=" .$registro['id_vehiculo'] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
				echo '</td>';

 }
}

?>