<?php
require('../php/funciones.php');
	/*session_start();
	if(isset($_SESSION['nombreusu']))
	{ */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title> </title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
	<header>
	</header>

	<div class="container">
		<div class="row">	
			<br><a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Vehiculo</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th><th>Modelo</th><th>Marca</th><th>Año</th><th>Patente</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			mostrardatos();
	

?>
	        </table>
		</div> 



		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Vehiculo</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="php/insertar.php" method="POST">
                       		<div class="form-group">
                       			<label for="marca">Marca:</label>
                       			<input class="form-control" id="marca" name="marca" type="text" placeholder="Marca"></input>
                       		</div>              		
                       		<div class="form-group">
                       			<label for="modelo">Modelo:</label>
                       			<input class="form-control" id="modelo" name="modelo" type="text" placeholder="Modelo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="anio">Año:</label>
                       			<input class="form-control" id="anio" name="anio" type="text" placeholder="Año"></input>
                       		</div>

                       		<div class="form-group">
                       			<label for="patente">Patente:</label>
                       			<input class="form-control" id="patente" name="patente" type="text" placeholder="Patente"></input>
                       		</div>


							<input type="submit" class="btn btn-success" value="Guardar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contacto</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="php/actualiza.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input> 
                       		        <div class="form-group">
		                       			<label for="marca">Marca:</label>
		                       			<input class="form-control" id="marca" name="marca" type="text"  ></input>
		                       		</div>  		
		                       		<div class="form-group">
		                       			<label for="modelo">Modelo:</label>
		                       			<input class="form-control" id="modelo" name="modelo" type="text"></input>
		                       		</div>      		
		                       		<div class="form-group">
		                       			<label for="anio">Año:</label>
		                       			<input class="form-control" id="anio" name="anio" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="patente">Patente:</label>
		                       			<input class="form-control" id="patente" name="patente" type="text" ></input>
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



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('modelo')
		  var recipient2 = button.data('marca')
		  var recipient3 = button.data('anio')
		  var recipient4 = button.data('patente')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #modelo').val(recipient1)
		  modal.find('.modal-body #marca').val(recipient2)
		  modal.find('.modal-body #anio').val(recipient3)
		  modal.find('.modal-body #patente').val(recipient4)		 
			 
		});
		
	</script>
	
</body>
</html>

<?php
	/*}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}*/
?>