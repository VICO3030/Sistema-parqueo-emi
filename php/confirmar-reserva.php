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
<link href="../css/tablas-estilo.css" rel="stylesheet">s
<link href="../css/style.css" rel="stylesheet">

<!-- skin color -->
<link href="color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">

</head>
<?php include('reservas-funciones.php');
?>
<body>
<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="../index.php"><img src="../img/titulo-autospace.png" /></a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">			
				      <!--  <li class="dropdown">
				          <a title="Gestion" href="#Gestion" class="dropdown-toggle" data-toggle="dropdown">Gestion de datos <b class="caret"></b></a>
				          <ul class="dropdown-menu">
				      

				            <li><a href="#works" target="" href="registro.php" target="muestrario">Personas</a></li>
				            	<li class="dropdown-submenu">
                					<a tabindex="-1" href="#works">Vehiculos</a>
               			 			<ul class="dropdown-menu">
					                <li><a tabindex="-1" href="#">Registrar</a></li>
					                <li><a tabindex="-1" href="#">Mis vehiculos</a></li>
					                </ul>
					            </li>

							-->

				      <?php if (isset($_SESSION['usuario'])) { ?>
					<li><a title="Reservas" href="#works">Realizar reserva</a></li>
					<?php } else { ?>
					<li><a href="../login.php">Iniciar Sesion</a></li>
					<li><a title="Registrarse" href="../index.php#works">Registrarse</a></li>
					<?php } ?>
					<li><a title="Horarios" href="../index.php#horarios">Horarios</a></li>





					<li><a title="contacto" href="../index.php#contacto">Contacto</a></li>
					<li><a href="page.html">Page</a></li>
					<li><a href="Camaras.html">Camaras</a></li>
					<?php if (isset($_SESSION['usuario'])) { ?>
					
					<li class="dropdown">
				          <a title="Usuario" href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #FF9933;"><?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
				          <ul class="dropdown-menu">
					          <li><a href="logout.php" target="">Salir</a></li>
					 	  </ul> 
					</li>
					<?php } ?>    
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- spacer section -->
<section class="celestial">
	<?php if(!(isset($_POST['puesto']))){ 
	$estacionamiento= consulta("SELECT nombre_estacionamiento from estacionamiento where id_estacionamiento =".$_SESSION['estacionamiento'].";");
		$_SESSION['nombre-estacion'] = $estacionamiento[0]['nombre_estacionamiento'];
		echo "<h3 style='text-align: center;'>".$_SESSION['nombre-estacion']."</h3>";
	echo "<div class='datagrid' style='width: 30%; margin: 0 auto;'>";
		?>
		<table>
			<thead>
				<tr>
					<th>Número de puesto</th>
					<th>Seleccionar</th>
				<tr>
			</thead>
			<tbody>
			<form name="forma1" action="" method="post">
			<?php
			puestos_disponibles($_SESSION['fechareserva'], $_SESSION['horareserva'], $_SESSION['horafin']); ?>
			</form>
			</tbody>
		</table>
	</div>
	<?php } elseif(isset($_POST['puesto'])) {
		echo "<div class='confirmacion'><h3>¿Confirma la reserva?</h3>";
		echo "Reserva a nombre de: ".obtener_datos_usuario('nombre_persona')." ".obtener_datos_usuario('apellido')."</br></br>";
		echo "Estacionamiento: ".$_SESSION['nombre-estacion']."</br></br>";
		echo "Fecha de reserva: ".$_SESSION['fechareserva']."</br></br>";
		echo "Número de puesto: ".$_POST['puesto']."</br></br>";
		if (isset($_SESSION['horafin'])) {
			$horafin = $_SESSION['horafin'];
		} else {
			$horafin = "Sin hora de fin";
		}
		$_SESSION['horafin'] = $horafin;
		$_SESSION['puesto'] = $_POST['puesto'];
		//guardar el id del puesto
		$puestoMatriz = consulta("SELECT id_puesto from puestos where numero = ".$_SESSION['puesto']." AND rela_estacionamiento = ".$_SESSION['estacionamiento'].";");
		$_SESSION['id_puesto'] = $puestoMatriz[0]['id_puesto'];
		echo "Hora de Reserva: ".$_SESSION['horareserva']."&nbsp;&nbsp;&nbsp;&nbsp; Hora de fin: ".$horafin."</br></br>";
	?>
	<form name="forma2" action="" method="post">
		<input type="submit" name="reservar" value ="Reservar" /><input type="submit" name="cancelar" value ="Cancelar" />
	</form>
	</div>
	<?php
	} 
	if(isset($_POST['reservar'])) {
		echo "reservo";
		$_SESSION['persona'] = obtener_datos_usuario('apellido')." ".obtener_datos_usuario('nombre_persona');
		$_SESSION['idpersona'] = obtener_datos_usuario('id_persona');
		alta_reserva();
		header('location: generador.php');
	} elseif(isset($_POST['cancelar'])) {
		header('location: ../index.php');
	}
	?>
</section>

<footer>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<ul class="social-networks">
				<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
			</ul>
			<p class="copyright">
				&copy; Autospace - 2017.
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- nav -->
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<!-- localScroll -->
<script src="js/jquery.localscroll-1.2.7-min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- prettyPhoto -->
<script src="js/jquery.prettyPhoto.js"></script>
<!-- Works scripts -->
<script src="js/isotope.js"></script>
<!-- flexslider -->
<script src="js/jquery.flexslider.js"></script>
<!-- inview -->
<script src="js/inview.js"></script>
<!-- animation -->
<script src="js/animate.js"></script>
<!-- twitter -->
<script src="js/jquery.tweet.js"></script>
<!-- contact form -->
<script src="js/validate.js"></script>
<!-- custom functions -->
<script src="js/custom.js"></script>
</body>
</html>