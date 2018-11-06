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
    		<td ><img src="imagenes/baner.png" alt="Capital Deporiva Apodaca" width="950" height="200" /></td>
        </tr>
        <tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="../imagenes/linea.png" /></td>
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
                        	<form action="acciones.php" method="post">
                	<table border="0" cellpadding="2" cellspacing="0" width="715">
                    	<tr>
      			<td colspan="2" class="punteado"><div align="center">Agregar proveedores al directorio</div></td>
    					</tr>
                   	  <tr>
   					<td align="right" nowrap="nowrap" class="texto">Nombre de Proveedor:</td>
      				<td><input type="text" name="nombreproveedor"  size="32" /></td>
   					  </tr>
    					<tr valign="baseline">
                              <td nowrap="nowrap" align="right"><span class="texto">Dirección:</span></td>
                              <td><input type="text" name="direccion"  size="32" /></td>
                        </tr>
    				<tr valign="baseline">
                              <td nowrap="nowrap" align="right"><span class="texto">Estado:</span></td>
                              <td><input type="text" name="estado"  size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                              <td nowrap="nowrap" align="right"><span class="texto">R. F. C.:</span></td>
                              <td><input type="text" name="rfc"  size="32" /></td>
                        </tr>
                        <tr>
   					<td align="right" nowrap="nowrap" class="texto">Nombre de Contacto:</td>
      				<td><input type="text" name="contacto"  size="32" /></td>
                        <tr>
   					<td align="right" nowrap="nowrap" class="texto">Correo:</td>
      				<td><input type="text" name="correo"  size="32" /></td>
   				</tr>
    					<tr valign="baseline">
                              <td nowrap="nowrap" align="right"><span class="texto">Página Web:</span></td>
                              <td><input type="text" name="paginaweb"  size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                              <td nowrap="nowrap" align="right">&nbsp;</td>
                              <td><input type="submit" name='InsertarRegistro' value="InsertarProveedor" /></td>
    					</tr>
  					</table>
  					<input type="hidden" name="MM_insert" />
					</form>
                            <p align="center"><a href="../vistas/listarproveedores.php" class="texto">Regresar</a></p>
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
	</table>
</body>
</html>
