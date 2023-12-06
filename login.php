<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- css -->
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- skin color -->
<link href="color/default.css" rel="stylesheet">
<link href="css/login-estilo.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
	<?php
include('php/login-funciones.php');
function registrarse(){
	if(isset($_POST['registro'])) {
		header('location: index.php#works');
	}
}
?>
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
					<li><a title="Gestion de datos" href="index.php#works">Gestion de datos</a></li>
					<li><a title="contact" href="index.php#contact">Contact</a></li>
					
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>


<!-- spacer section -->
<section class="spacer green">
	<form method="post" action="">
	  <h1>Ingresar a AutoSpace</h1>
	  <div class="inset">
	  <p>
	    <label for="email">Usuario</label>
	    <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
	  </p>
	  <p>
	    <label for="password">Contraseña</label>
	    <input type="password" name="pass" id="pass" placeholder="Contraseña">
	  </p>
	  </div>
	  <p class="p-container">
	    <input type="submit" name="ingreso" id="ingreso" value="Ingresar">
	    <input type="submit" name="registro" id="registro" value="Registrarse">
	  </p>
	</form>
		<?php 
		registrarse();
		login(); ?>
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
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
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
