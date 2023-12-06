<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AutoSpace - Administracion</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<?php 
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['perfil'] == "Administrador") { ?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>AutoSpace</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
 							<li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
 						</ul>
 					</li>
 				</ul>
 			</div>
 							
 		</div><!-- /.container-fluid -->
 	</nav>
 		
 	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
 		<form role="search">
 			<div class="form-group">
 				<input type="text" class="form-control" placeholder="Search">
 			</div>
 		</form>
 		<ul class="nav menu">
 			<li class="active"><a href="index.php"><span class="glyphicon glyphicon glyphicon-flag "></span> Reservas</a></li>
 			<li><a href="charts.php"><span class="glyphicon glyphicon-stats"></span> Estadisticas</a></li>
 			<li><a href="tables.php"><span class="glyphicon glyphicon-user "></span> Usuarios</a></li>
 
 	</div><!--/.sidebar-->
 		
 	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
 			<ol class="breadcrumb">
 				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
 				<li class="active">Reservas</li>
			</ol>
 		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservas</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon glyphicon-flag glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php 
								include_once('php/Consultas.php');
								echo Contar_Reservas("Dia"); 
							?>
								
							</div>
							<div class="text-muted">Reservas Hoy</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon glyphicon-flag glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php 
								include_once('php/Consultas.php');
								echo Contar_Reservas("Mes"); 
							?></div>
							<div class="text-muted">Reservas Este Mes</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-flag  glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php 
								include_once('php/Consultas.php');
								echo Contar_Reservas("Año"); 
								?>
									
								</div>
							<div class="text-muted">Reservas Este Año</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-user glyphicon-l "></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php include_once('php/Consultas.php');
							echo Contar_Usuarios();

							 ?>
							 	
							 </div>
							<div class="text-muted">Usuarios</div>
						</div>
					</div>
				</div>
			</div>
	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
					
						<ul class="nav nav-tabs">
							<li class="active"><a href="#pilltab1" data-toggle="tab"> Reservas de Hoy</a></li>
							<li><a href="#pilltab2" data-toggle="tab">Reservas Este Mes</a></li>
							<li><a href="#pilltab3" data-toggle="tab">Reservas Este Año</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade in active" id="pilltab1">
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												
												<div class="panel-body">
													<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
													    <thead>
													    <tr>
													        <th>Apellido</th>
													        <th>Nombre</th>
													        <th>Nombre_Usuario</th>
													        <th>Fecha</th>
													        <th>Hora de Reserva</th>
													        <th>Fin de la Reserva</th>
													        <th>Accion</th>
													        

													    </tr>
													    </thead>

													    <tbody>
												        <tr>
												            <?php 
												            	include_once('php/Consultas.php');
												            	$Matriz_reservasMes = Generar_Dias();
												            	
												            	foreach ($Matriz_reservasMes as $clavemes) {
																	echo "<td>".$clavemes[0]."</td>";
																	echo "<td>".$clavemes[1]."</td>";
																	echo "<td>".$clavemes[2]."</td>";
																	echo "<td>".$clavemes[3]."</td>";
																	echo "<td>".$clavemes[4]."</td>";
																	echo "<td>".$clavemes[5]."</td>";
																	
																	echo '<td width=240>';

													                echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$clavemes['id_reserva'] ."' data-marca='" .$clavemes['fecha_reserva'] ."' data-modelo='" .$clavemes['hora_reserva'] ."'  data-anio='" .$clavemes['hora_fin'] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
																		
													                echo ' ';
													                echo "<a class='btn btn-danger' href='eliminar.php?id=" .$clavemes['id_reserva'] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
																	echo '</td>';
																	echo '</td>';
																	echo "</tr>";
																	
												            	}
												            	


												             ?>
												          
												          
												        </tr>
												     
												      </tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="tab-pane fade" id="pilltab2">
						
											<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												
												<div class="panel-body">
													<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
													    <thead>
													    <tr>
													        <th>Apellido</th>
													        <th>Nombre</th>
													        <th>Nombre_Usuario</th>
													        <th>Fecha</th>
													        <th>Hora de Reserva</th>
													        <th>Fin de la Reserva</th>
													        <th>Accion</th>
													        

													    </tr>
													    </thead>

													    <tbody>
												        <tr>
												             <?php 
												            	include_once('php/Consultas.php');
												            	$Matriz_reservasMes = Generar_Mes();
												            	
												            	foreach ($Matriz_reservasMes as $clavemes) {
																	echo "<td>".$clavemes[0]."</td>";
																	echo "<td>".$clavemes[1]."</td>";
																	echo "<td>".$clavemes[2]."</td>";
																	echo "<td>".$clavemes[3]."</td>";
																	echo "<td>".$clavemes[4]."</td>";
																	echo "<td>".$clavemes[5]."</td>";
																	
																	echo '<td width=240>';

													                echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$clavemes['id_reserva'] ."' data-marca='" .$clavemes['fecha_reserva'] ."' data-modelo='" .$clavemes['hora_reserva'] ."'  data-anio='" .$clavemes['hora_fin'] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
																		
													                echo ' ';
													                echo "<a class='btn btn-danger' href='eliminar.php?id=" .$clavemes['id_reserva'] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
																	echo '</td>';
																	echo '</td>';
																	echo "</tr>";
																	
												            	}
												            	


												             ?>
												          
												        
												     
												      </tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="tab-pane fade" id="pilltab3">
						
							
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												
												<div class="panel-body">
													<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
													    <thead>
													    <tr>
													        <th>Apellido</th>
													        <th>Nombre</th>
													        <th>Nombre_Usuario</th>
													        <th>Fecha</th>
													        <th>Hora de Reserva</th>
													        <th>Fin de la Reserva</th>
													        <th>Accion</th>
													        

													    </tr>
													    </thead>

													    <tbody>
												        <tr>
												            <?php 
												            	include_once('php/Consultas.php');
												            	$Matriz_reservasMes = Generar_Anio();
												            	
												            	foreach ($Matriz_reservasMes as $clavemes) {
																	echo "<td>".$clavemes[0]."</td>";
																	echo "<td>".$clavemes[1]."</td>";
																	echo "<td>".$clavemes[2]."</td>";
																	echo "<td>".$clavemes[3]."</td>";
																	echo "<td>".$clavemes[4]."</td>";
																	echo "<td>".$clavemes[5]."</td>";
																	
																	echo '<td width=240>';

													                echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$clavemes['id_reserva'] ."' data-marca='" .$clavemes['fecha_reserva'] ."' data-modelo='" .$clavemes['hora_reserva'] ."'  data-anio='" .$clavemes['hora_fin'] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
																		
													                echo ' ';
													                echo "<a class='btn btn-danger' href='php/eliminar.php?id=" .$clavemes['id_reserva'] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
																	echo '</td>';
																	echo '</td>';
																	echo "</tr>";
																	
												            	}
												            	


												             ?>
												          
												          
												        
												     
												      </tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
							</div>
							</div>
						</div>
					</div>
				</div><!--/.panel-->			
				

<!-- MODAL -->
			<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Reserva</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="php/actualizar.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden"  ></input>   		
		                       		<div class="form-group">
		                       			<label for="Fecha">Hora Reserva:</label>
		                       			<input class="form-control" id="modelo" name="Fecha_Res" type="text"  ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="HoraReserva">Fecha Reserva:</label>
		                       			<input class="form-control" id="marca" name="Hora_Reserva" type="text" ></input>
		                       		</div>
		                       		
		                       		<div class="form-group">
		                       			<label for="FinReserva">Fin de Reserva:</label>
		                       			<input class="form-control" id="anio" name="Fin_Reserva" type="text" ></input>
		                       		</div>

									<input type="submit" class="btn btn-success" value="Actualizar">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
<!-- MODAL -->


		
		
		
					
					

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>

	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('modelo')
		  var recipient2 = button.data('marca')
		  var recipient3 = button.data('anio')
		  
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #modelo').val(recipient1)
		  modal.find('.modal-body #marca').val(recipient2)
		  modal.find('.modal-body #anio').val(recipient3)
		  		 
			 
		});
		
	</script>
	<?php } else {
		echo "No esta habilitado para estar en esta zona";
		}?>
</body>

</html>
