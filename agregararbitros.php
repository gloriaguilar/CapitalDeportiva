<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Capital Deportiva Apodaca</title>
		<?php include('bootstrap.php') ?>
		<link href="estilos.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<!-- necesita el menú lateral -->
	<br><br><br>
	<div class="container-fluid">
		<h1 class="text-center">Agregar árbitros</h1><br>
		<div class="container">
			<form action="acciones.php" enctype="multipart/form-data" method="POST">
				<div class="form-group">
					<label>Nombre de árbitro</label>
					<input type="text" name="nombrearbitro" class="form-control" required/>
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<input type="text" name="telefono" class="form-control" required/>
				</div>
				<div class="form-group">
					<label>Celular</label>
					<input type="text" name="celular" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Fotografía:</label><br>
					<input type="file" class="btn" name="fleImagen" required/>
				</div>
				<button type="submit" class="btn btn-outline-info right m-2" name="InsertarRegistro" value="insertarArbitros">Guardar</button>
			</form>
			<a href="vistas/listararbitros.php" class="btn btn-outline-dark right m-2">Regresar</a> 			
		</div>
	</div>


<!--
	<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
  		
  		<tr>
    		<td bgcolor="#FFFFFF">
            	<table width="915" border="0">
                  <tr>
                        <td rowspan="3" width="5">&nbsp;</td>
                        <td colspan="3" height="20">&nbsp;</td>
                        <td rowspan="3" width="5">&nbsp;</td>
                  </tr>
                  <tr>
                        <td width="200" valign="top"><?php //require_once('menulateral.php'); ?></td>
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        	<form action="acciones.php" enctype="multipart/form-data" method="POST">
               				  <table border="0" cellpadding="2" cellspacing="0" width="715">
                    				
                        			<tr>
                          				<td colspan="2" nowrap="nowrap" class="texto">
                                        	<div align="left">
                              					<p>La fotografia que subas debe de ser maximo de 2MB (Para que no tengas problemas es recomendable que sean fotos<br />
                                                 tomadas con celulares).</p>
                                            </div>
                       	    			</td>
                       				</tr>
                        			<tr>
                          				<td align="right" nowrap="nowrap" class="texto">Fotografia:</td>
                          				<td><input type="file" name="fleImagen"/></td>
                        			</tr>
                   	  				<tr>
   						  				<td align="right" nowrap="nowrap" class="texto">Nombre de Arbitro:</td>
      									<td><input type="text" name="nombrearbitro" size="32" /></td>
   					  				</tr>
    								<tr valign="baseline">
                              			<td nowrap="nowrap" align="right"><span class="texto">Teléfono</span>:</td>
                              			<td><input type="text" name="telefono" size="32" /></td>
                        			</tr>
                        			<tr valign="baseline">
                              			<td nowrap="nowrap" align="right"><span class="texto">Celular</span>:</td>
                              			<td><input type="text" name="celular" size="32" /></td>
                        			</tr>
                        			<tr valign="baseline">
                              			<td nowrap="nowrap" align="right">&nbsp;</td>
                              			<td><button type="submit" name="InsertarRegistro" value="insertarArbitros"></button></td>
    								</tr>
  								</table>
							</form>
                            <p align="center"><a href="listararbitros.php" class="texto">Regresar</a></p>
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

