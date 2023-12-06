<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/tablas-estilo.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">

</head>
<?php 
require('php/reservas-funciones.php'); ?>
<body>
<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="index.php"><img src="img/titulo-autospace.png" /></a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">			
				  <!--   <li class="dropdown">
				          <a title="Gestion" href="#Gestion" class="dropdown-toggle" data-toggle="dropdown">Gestion de datos <b class="caret"></b></a>
				          <ul class="dropdown-menu">
				      

				            <li><a href="#works" target="" href="php/registro.php" target="muestrario">Personas</a></li>
				            	<li class="dropdown-submenu">
                					<a tabindex="-1" href="#works">Vehiculos</a>
               			 			<ul class="dropdown-menu">
					                <li><a tabindex="-1" href="#">Registrar</a></li>
					                <li><a tabindex="-1" href="#">Mis vehiculos</a></li>
					                </ul>
					            </li>

						

				            <li><a href="#works" target="" href="php/reservas.php" target="muestrario">Reservas</a></li>
				            <li><a href="#works">Estacionamiento</a></li>
				          </ul>
				        </li>-->
				    <?php if (isset($_SESSION['usuario'])) { ?>
					<li><a title="Reservas" href="#works">Realizar reserva</a></li>
					<li><a title="Mis Reservas" href="#reservas">Mis reservas</a></li>
					<li><a title="Vehículos" href="#servicios">Vehículos</a></li>
					<?php } else { ?>
					<li><a href="login.php">Iniciar Sesion</a></li>
					<li><a title="Registrarse" href="#works">Registrarse</a></li>
					<?php } ?>
					<li><a title="Horarios" href="#horarios">Horarios</a></li>





					<li><a title="contacto" href="#contacto">Contacto</a></li>
					
					
					<?php if (isset($_SESSION['usuario'])) { ?>
					<li class="dropdown">
				          <a title="Usuario" href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #FF9933;"><?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
				          <ul class="dropdown-menu">
					          <li><a href="php/logout.php" target="">Salir</a></li>
					 	  </ul> 
					</li>
					<?php } ?>    
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Header area -->
<div id="header-wrapper" class="header-slider">
	<header class="clearfix">
	<div class="logo">
		<img src="img/logo-image.png" alt="" />
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="main-flexslider" class="flexslider">
					<ul class="slides">
						<li>
						<p class="home-slide-content">
							Reservas<strong> online</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							Estacionamiento<strong> automatizado</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							No pierda su <strong> tiempo</strong>
						</p>
						</li>
					</ul>
				</div>
			
			</div>
		</div>
	</div>
	</header>
</div>
<!-- spacer section -->
<section class="spacer green">
<div class="container">
	<div class="row">
		<div class="span6 alignright flyLeft">
			<blockquote class="large">
				Buscamos facilitar tu andar en la carretera de la vida<cite>Equipo de desarrollo de AutoSpace</cite>
			</blockquote>
		</div>
		<div class="span6 aligncenter flyRight">
			<i class="icon-coffee icon-10x"></i>
		</div>
	</div>
</div>
</section><!-- end spacer section -->
<!-- section: team -->
<section id="gestion" class="section">
<div class="container">
	<div style="text-align: center;"><img src="img/separador-lineas.png" /></div>
	<h4>Sobre AutoSpace</h4>
	<div class="row">
		<div class="span4 offset1">
			<div>
				<p>
					Autospace es un sistema para la gestión de reservas de puestos en diferentes playas de estacionamiento de la ciudad.
					Cuenta con un registro de usuario, la administración de datos del vehículo del usuario y el soporte de reservas por día en un intervalo de horas dado.
				</p>
			</div>
		</div>
		<div class="span6">
			<div class="aligncenter">
				<img src="img/icons/estacionamientoblanco.jpg" alt="" />
			</div>
		</div>
	</div>
	<div class="row">
		<div style="text-align: center;"><img src="img/separador-lineas.png" /></div>
	</div>
</div>
<!-- /.container -->
</section>
<!-- end section: team -->
<!-- section: services -->
<?php if (isset($_SESSION['usuario'])) { ?>
<section id="reservas" class="sectionreservas">
	<center><h3>Mis Reservas</h3>
	<table border="1" style="text-align: center; background-color: #ffffff;">
		<tr>
			<th>Nro Reserva</th>
			<th>Estacionamiento</th>
			<th>Fecha</th>
			<th>Hora Inicio</th>
			<th>Hora Fin</th>
			<th>Número Puesto</th>
		</tr>
		<?php
		reservas_usuario(); 
		?>
	</table></center>
</section>
<section id="servicios" class="section orange">
<div class="container">
	<h4>Vehículos</h4>
	<center><iframe name="vehiculos" scrolling="auto" width="810px" style="margin: 0 auto; position: relative;" height="500px" frameborder="0" src="lista/listar.php"></iframe></center>
</div>
</section>
<?php }?>
<!-- end section: services -->
<!-- section: works -->
<section id="works" class="section">
<div class="container clearfix">
	<!-- portfolio filter -->
	<div class="row">
		<div id="filters" class="span12">
		<!--
			<ul class="clearfix">
				<li><a href="php/registro.php" target="muestrario">
				<h5>Registrar Usuario</h5>
				</a></li>
				<li><a href="php/reservas.php" target="muestrario">
				<h5>Reservas</h5>
				</a></li>
				<li><a href="php/vehiculos.php" target="muestrario">
				<h5>Registro de vehículos</h5>
				</a></li>
				<li><a href="#">
				<h5>Gestión de estacionamientos</h5>
				</a></li>
				<li><a href="#">
				<h5>Photography</h5>
				</a></li>
			</ul>
		-->
		</div>
		<!-- END PORTFOLIO FILTERING -->
	</div>
				<!--Con esto mostramos las diferentes secciones de alta-->
				<?php if (isset($_SESSION['usuario'])) {
					$funcionIframe = "php/reservas.php";
				} else { 
					$funcionIframe = "php/registro.php";
				}?>

				<center><iframe name="muestrario" scrolling="auto" width="810px" style="margin: 0 auto; position: relative;" height="800px" frameborder="0" src="<?php echo $funcionIframe; ?>"></iframe></center>
				
			<!--</div>
		</div>
	</div>-->
</div>
</section>
<!-- spacer section -->
<section class="spacer bg3">
<div class="container">
	<div class="row">
		<div class="span12 aligncenter flyLeft">
			<blockquote class="large">
				 Proponemos una nueva manera de asegurarte un espacio para un bien material de tanto valor como es tu vehículo.
			</blockquote>
		</div>
		<div class="span12 aligncenter flyRight">
			<i class="icon-rocket icon-10x"></i>
		</div>
	</div>
</div>
</section>
<!-- end spacer section -->
<!-- section: blog -->
<section id="horarios" class="section">
<div class="container">
	<h4>Horarios disponibles</h4>
	
	<div class="row">
	<form action="index.php#horarios" method="post">
		<select name="estacionamiento">
			<?php
			$estacionamientosA = consulta("SELECT id_estacionamiento, direccion_estacionamiento, nombre_estacionamiento, numero_puestos FROM estacionamiento;");
			cargar_combo($estacionamientosA, 'nombre_estacionamiento', 'id_estacionamiento');
			 ?>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name = "filtroEstacionamientos" value="Mostrar Datos de Estacionamiento" />
	</form>
		<div class="datagrid">
		<table><thead>
			<tr>
				<th>Horario</th>
				<?php
				asignar_fechas_tabla();
				?>
			</tr></thead>
			<tbody>
			<?php 
			if (isset($_POST['estacionamiento'])) {
				cargar_horarios(); 
			} else { ?>
			<tr>
				<td rowspan=10 colspan=7><h2>Seleccione un estacionamiento</h2></td>
			</tr>
			<?php } ?>
			</tbody>
		</table></div>
	</div>
	<div class="blankdivider30"></div>
	<div class="aligncenter">
		<?php if (isset($_SESSION['usuario'])) {
			$direccion = "Ir a Reservas";
			} else {
				$direccion = "Ir a Registro";
			} 
		echo "<a href='#works' class='btn btn-large btn-theme'>".$direccion."</a>";
		?>
	</div>
</div>
</section>

<!-- end spacer section -->
<!-- section: contact -->
<section id="contacto" class="section green">
<div class="container">
<?php if(!(isset($_SESSION['perfil'])) or $_SESSION['perfil'] == "Usuario") { ?>
	<h4>Contacto</h4>
	<p>
		 	</p>
	<div class="blankdivider30">
	</div>
	<div class="row">
		<div class="span12">
			<div class="form" id="contact-form">
				<div id="sendmessage">Su mensaje ha sido enviado</div>
                <div id="errormessage"></div>
				<form action="index.php#contacto" method="post" role="form">
					<div class="row">
						<div class="span6">
							<div class="field your-name form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                                <div class="validation"></div>
							</div>
							<div class="field your-email form-group">
								<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" data-rule="email" data-msg="Ingrese Mail Valido" />
                                <div class="validation"></div>
							</div>
							<div class="field subject form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="El asunto debe tener al menos 8 caracteres" />
                                <div class="validation"></div>
							</div>
						</div>
						<div class="span6">
							<div class="field message form-group">
								<textarea class="form-control" name="mensaje" rows="5" data-rule="required" data-msg="Por Favor escriba un mensaje" placeholder="Mensaje"></textarea>
                                <div class="validation"></div>
							</div>
							<input type="submit" name="consulta" value="Enviar Mensaje" class="btn btn-theme pull-left">
						<?php 
								email();
							 ?>
						
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ./span12 -->
	</div>
	<?php } elseif($_SESSION['perfil'] == "Administrador") {?>
		<center><h4>Consultas</h4>
		<table border="1" style="text-align: center; background-color: #ffffff;">
			<tr>
				<th>Nro Consulta</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Asunto</th>
				<th>Mensaje</th>
			</tr>
			<?php
			ver_consultas(); 
			?>
		</table></center>
		<?php	} ?>
</div>
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
				&copy; Autospace. All rights reserved.
                <div class="credits">
                    
 
                </div>
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localscroll-1.2.7-min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/validate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
