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
		<h1>Proveedores del Directorio</h1><br>
		<div class="row">
			<div class="col-md-11 table-responsive center_horizontal">
				<table class="table table-hover text-center">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Proveedor</th>
							<th scope="col">Dirección</th>
							<th scope="col">Estado</th>
							<th scope="col">RFC</th>
							<th scope="col">Contacto</th>
							<th scope="col">Correo</th>
							<th scope="col">Página web</th>
							<th scope="col">Acciones</th>
							<th scope="col">
								<a href="../agregarproveedores.php">
									<img src="../imagenes/agregar.png" width="15" height="15" />
								</a>
							</th>
						</tr>
					</thead>
					<?php
						require("../Controllers/controllerProvedor.php");
						ControllerProvedor::MostrarProveedores();
					?>
										
				</table><!--Fin tabla-->
			</div> <!--Fin col-->
		</div><!--Fin row-->
		<br>
		<p><a href="../intranet.php" class="btn btn-outline-secondary">Regresar</a></p>
	</div><!--Fin container-->
	<br><br><br><br><br>

	<?php include('menulateralS.php'); ?>

	<!-- <table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96 ">
  		<tr>
    		<td ><img src="../imagenes/baner.png" alt="Capital Deporiva Apodaca" width="950" height="200" /></td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="../imagenes/linea.png" /></td>
  		</tr>
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
                        <td>NOMBRE PROVEEDOR</td>
												<td>DIRECCIÓN</td>
												<td>ESTADO</td>
												<td>RFC</td>
                        <td>CONTACTO</td>
												<td>CORREO</td>
												<td>PÁGINAS WEB</td>
                        <td colspan="3">OPERACION</td>
												<td><a href="../agregarproveedores.php"><img src='../imagenes/agregar.png' width='15' height='15' /></a></td>

                      </tr>
											<?php //require("../Controllers/controllerProvedor.php");
													//ControllerProvedor::MostrarProveedores();  ?>
				</table>
                            <p align="center"><a href="../intranet.php" class="texto">Regresar</a></p>
                        <!-- CODIGO CUERPO PAGINA --
                		</td>
          			</tr>
           			<tr>
            			<td colspan="3" height="20">&nbsp;</td>
            		</tr>
				</table>
    	
			</td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="../imagenes/linea.png" /></td>
  		</tr>
  		<tr>
    		<td><img src="../imagenes/pie.png" alt="Capital Deporiva Apodaca" width="950" height="46" /></td>
  		</tr>
	</table> -->
</body>
</html>
