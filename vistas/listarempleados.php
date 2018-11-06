<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Capital Deportiva Apodaca</title>
<style type="text/css">
a img {border:0}
</style>
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#006699">
	<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
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
                        <td width="735" valign="top">
                        <!-- CODIGO CUERPO PAGINA -->
                			<table border="0" cellpadding="2" cellspacing="0" width="715">
                      			<tr class="punteado">
									<td>IMAGEN</td>
                        			<td>NOMBRE</td>
									<td>PUESTO</td>
                        			<td>TELEFONO</td>
                        			<td>CELULAR</td>
                              		<td>CORREO</td>
                        			<td colspan="3">ACCIONES</td>
									<td><div align='center'><a href='../agregarempleados.php'><img src='../imagenes/agregar.png' width='15' height='15' /></a></div></td>
                      			</tr>
													<?php require("../DatosBd.php");
													Connexiones::MostrarEmpleados();  ?>
							</table>
                		</td>
                        <!-- CODIGO CUERPO PAGINA -->
                  	</tr>
              		<tr>
                		<td colspan="3" height="20">&nbsp;</td>
               		</tr>
				</table>
				<p align="center"><a href="../intranet.php" class="texto">Regresar</a></p>
			</td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="../imagenes/linea.png" /></td>
  		</tr>
  		<tr>
    		<td><img src="../imagenes/pie.png" alt="Capital Deporiva Apodaca" width="950" height="46" /></td>
  		</tr>
	</table>
</body>
</html>


                
          	