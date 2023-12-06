<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AutoSpace Usuarios</title>

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
			<li><a href="index.php"><span class="glyphicon glyphicon-flag"></span> Reservas</a></li>
			<li><a href="charts.php"><span class="glyphicon glyphicon-stats"></span> Estadisticas</a></li>
			<li class="active"><a href="tables.php"><span class="glyphicon glyphicon-user "></span> Usuarios</a></li>
		
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Usuarios</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Usuarios</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Usuarios Registrados</div>
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
						        <tr>
						            <th>Nombre </th>
						            <th>Apellido </th>
						            <th>Nombre de Usuario</th>
						            <th>Contraseña</th>
						            <th>Accion</th>

						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <?php 
						            	include_once('php/Consultas.php');
						            	$Matriz_Usuarios = Cargar_Usuario();
						            	foreach ($Matriz_Usuarios as $clavemes) {
																	echo "<td>".$clavemes[2]."</td>";
																	echo "<td>".$clavemes[3]."</td>";
																	echo "<td>".$clavemes[0]."</td>";
																	echo "<td>".$clavemes[1]."</td>";
																
																	
																	echo '<td width=240>';

													                echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$clavemes['id_usuario'] ."' data-marca='" .$clavemes['pass'] ."' data-modelo='" .$clavemes['nombre_usuario'] ."'   class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
																		
													                echo ' ';
													                echo "<a class='btn btn-danger' href='eliminarusuarios.php?id=" .$clavemes['id_usuario'] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
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
		</div><!--/.row-->


		<!-- MODAL -->
			<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Usuarios</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="php/actualizarusuario.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden"  ></input>   		
		                       		<div class="form-group">
		                       			<label for="Fecha">Usuario:</label>
		                       			<input class="form-control" id="modelo" name="Usuario" type="text"  ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="HoraReserva">Contraseña:</label>
		                       			<input class="form-control" id="marca" name="Contrasenia" type="text" ></input>
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
		





						
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div><!--/.row-->	



		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
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
