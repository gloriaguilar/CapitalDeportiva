<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Capital Deportiva Apodaca</title>
		<?php include('bootstrapS.php'); ?>
	</head>
<body>
	<br><br>
	<div class="container-fluid text-center">
		<h1>Equipos del Directorio</h1><br>
		<div class="row">
			<div class="col-md-11 table-responsive center_horizontal">
				<table class="table table-hover text-center">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Equipo</th>
							<th scope="col">Entrenador</th>
							<th scope="col">Rama</th>
							<th scope="col">Categoría</th>
							<th scope="col">Teléfono</th>
							<th scope="col">Celular</th>
							<th scope="col">Correo</th>
							<th scope="col">Acciones</th>
							<th scope="col">
								<a href="../agregarequipos.php">
									<img src="../imagenes/agregar.png" width="15" height="15" />
								</a>
							</th>
						</tr>
					</thead>
					<?php
						require("../Controllers/controllerEquipo.php");
						ControllerEquipo::MostrarEquipo(); ?>
										
				</table><!--Fin tabla-->
			</div> <!--Fin col-->
		</div><!--Fin row-->
		<br>
		<p><a href="../intranet.php" class="btn btn-outline-secondary">Regresar</a></p>
	</div><!--Fin container-->
	<br>
	<?php include('menulateralS.php'); ?>

	<!-- <table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96"> 		
  		<tr>
    		<td bgcolor="#FFFFFF">
    			<table width="950" border="0">
                	<tr>
                    	<td rowspan="3" width="5">&nbsp;</td>
                        <td colspan="3" height="20">&nbsp;</td>
                        <td rowspan="3" width="5">&nbsp;</td>
                  	</tr>
                  	<tr>
                       
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        <!-- CODIGO CUERPO PAGINA --
                			<table border="0" cellpadding="2" cellspacing="0" width="715">
                     			<tr class="punteado">
                        		<td>EQUIPO</td>               
                    				<td>ENTRENADOR</td>
                    				<td>RAMA</td>
									<td>CATEGORIA</td>
									<td>TELEFONO</td>
                    				<td>CELULAR</td>
									<td>EMAIL</td>
                    				<td>OPERACION</td>
									<td><a href="../agregarequipos.php"><img src="../imagenes/agregar.png" width="15" height="15" /></a></td>									
                 				</tr>
								 <?php
									// require("../Controllers/controllerEquipo.php");
									// ControllerEquipo::MostrarEquipo(); ?>
                			</table>

                                <p align="center"><a href="../intranet.php" class="texto">Regresar</a></p>
                    	</td>
          			</tr>
            		<tr>
                		<td colspan="2" height="20"></td>
            		</tr>
				</table>
			</td>
  		</tr>
  		
	</table> -->
</body>
</html>

