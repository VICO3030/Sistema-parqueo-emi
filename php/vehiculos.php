<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- css -->
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<!-- skin color -->
<link href="../css/registro-estilo.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
	<?php
include('funciones.php');
?>


<!-- spacer section -->

	<form method="post" action="">
	  <h1>Registrar Vehiculo</h1>
	  <div class="inset">
	  <p>
	    <label for="marca">Marca</label>
	    <input type="text" name="marca" id="marca" placeholder="Ingrese Marca ">
	  </p>
	  <p>
	    <label for="modelo">Modelo</label>
	    <input type="text" name="modelo" id="modelo" placeholder="Ingrese Modelo">
	  </p>
	  <p>
	    <label for="anio">Año</label>
	    <input type="text" name="anio" id="anio" placeholder="Ingrese Año">
	  </p>
	  <p>
	    <label for="patente">Patente</label>
	    <input type="text" name="patente" id="patente" placeholder="Ing. su patente">
	  </p>
	  
	  </div>
	  <p class="p-container">
	    <input type="submit" name="registro" id="registro" value="Registrarse">
	  </p>
	</form>
		<?php insertar_vehiculo(); ?>

		


</body>
</html>
