<!DOCTYPE >
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Capital Deportiva Apodaca</title>
		<?php include('bootstrapS.php'); ?>
		<link href="estilos.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<br>
	<div class="container-fluid text-center">
		<h1>Árbitros del Directorio</h1><br>
		<div class="row">
			<div class="col-md-10 table-responsive center_horizontal">
				<table class="table table-hover text-center">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Foto de perfil</th>
							<th scope="col">Nombre</th>
							<th scope="col">Teléfono</th>
							<th scope="col">Celular</th>
							<th scope="col">Acciones</th>
							<th scope="col">
								<a href='../agregararbitros.php'>
									<img src='../imagenes/agregar.png' width='15' height='15' />
								</a>
							</th>
						</tr>
					</thead>
					<?php
						require_once("../Controllers/controllerArbitro.php");
						controllerArbitro::MostrarArbitros(); 
					?>					
				</table><!--Fin tabla-->
			</div><!--Fin col-->
		</div><!--Fin row-->
		<br>
		<p><a href="../intranet.php" class="btn btn-outline-secondary">Regresar</a></p>
	</div><!--Fin container-->
	
	<?php include('menulateralS.php'); ?>

	<!--
	<table class="table" width="950" border="0" cellspacing="0" cellpadding="0" align="center">
		
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
									<td>FOTO DE PERFIL</td>                        			
									<td>NOMBRE</td>
									<td>TELEFONO</td>
									<td>CELULAR</td>
									<td colspan="3">OPERACION</td>
									<td><div align='center'><a href='../agregararbitros.php'><img src='../imagenes/agregar.png' width='15' height='15' /></a></div></td>
								</tr>
									<?php
									// require_once("../Controllers/controllerArbitro.php");
									// controllerArbitro::MostrarArbitros(); ?>
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
	</table>-->
</body>
</html>
