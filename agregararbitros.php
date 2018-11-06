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
<body bgcolor="#516E96">
	<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
  		<tr>
    		<td ><img src="imagenes/baner.png" alt="Capital Deporiva Apodaca" width="950" height="200" /></td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="imagenes/linea.png" /></td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF">
            	<table width="915" border="0">
                  <tr>
                        <td rowspan="3" width="5">&nbsp;</td>
                        <td colspan="3" height="20">&nbsp;</td>
                        <td rowspan="3" width="5">&nbsp;</td>
                  </tr>
                  <tr>
                        <td width="200" valign="top"><?php require_once('menulateral.php'); ?></td>
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        	<form action="acciones.php" enctype="multipart/form-data" method="POST">
               				  <table border="0" cellpadding="2" cellspacing="0" width="715">
                    				<tr>
      									<td colspan="2" class="punteado"><div align="center">Agregar árbitros al directorio</div></td>
    								</tr>
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
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="imagenes/linea.png" /></td>
  		</tr>
  		<tr>
    		<td><img src="imagenes/pie.png" alt="Capital Deporiva Apodaca" width="950" height="46" /></td>
  		</tr>
	</table>
</body>
</html>

