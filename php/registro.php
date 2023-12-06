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
	  <h1>Registrese</h1>
	  <div class="inset">
	  
	    <label for="email">Usuario</label>
	    <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
	  
	  
	    <label for="password">Contrase&ntilde;a</label>
	    <input type="password" name="pass" id="pass" placeholder="Contraseña">
	  
	  
	    <label for="password">Repetir Contraseña</label>
	    <input type="password" name="repass" id="repass" placeholder="Repetir Contraseña">
	  
	  
	    <label for="nombre">Nombre</label>
	    <input type="text" name="nombre" id="nombre" placeholder="Ing. su Nombre">
	  
	  
	    <label for="apellido">Apellido</label>
	    <input type="text" name="apellido" id="apellido" placeholder="Ing. Apellido">
	  
	    <label for="dni">DNI</label>
	    <input type="text" name="dni" id="dni" placeholder="Ing. DNI">
	  
	    <label for="domicilio">Domicilio</label>
	    <input type="text" name="domicilio" id="domicilio" placeholder="Ing. Domicilio">
	  
	    <label for="telefono">Telefono</label>
	    <input type="text" name="telefono" id="telefono" placeholder="Ing. telefono/Cel.">
	  

	  </div>
	  <p class="p-container">
	    <center><input type="submit" name="registro" id="registro" value="Registrarse"></center>
	  </p>
	</form>
		<?php
		if(isset($_POST['registro'])){
		validacion_registro_usuario(); }?>

		


</body>
</html>
