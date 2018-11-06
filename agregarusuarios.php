<?php require_once('Connections/capitaldeportiva.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	//Guardar imagen
	//if(is_uploaded_file($_FILES['fleImagen']['tmp_name'])) { // verifica haya sido cargado el archivo
		//$ruta= "fotos/".$_FILES['fleImagen']['name'];
		//move_uploaded_file($_FILES['fleImagen']['tmp_name'], $ruta);
	//}
////////////// Parte añadida 1 ////////////// 
 //array de archivos disponibles
  $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png');
  $limite_kb = 30720;
  //carpteta donde vamos a guardar la imagen
  $carpeta = 'fotos/';
  //recibimos el campo de imagen
  $imagen = $_FILES['fleImagen']['tmp_name'];
  //guardamos el nombre original de la imagen en una variable
  $nombrebre_orig = $_FILES['fleImagen']['name'];
  //el proximo codigo es para ver que extension es la imagen
  $array_nombre = explode('.',$nombrebre_orig);
  $cuenta_arr_nombre = count($array_nombre);
  $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
  //validamos la extension
  if(!in_array($extension, $archivos_disp_ar, $limite_kb * 30720)) $error = "Este tipo de archivo no es permitido";
  if(empty($error)){
	  //creamos nuevo nombre para que tenga nombre unico
	  $nombre_nuevo = time().'_'.rand(0,10000).'.'.$extension;
	  //nombre nuevo con la carpeta
	  $nombre_nuevo_con_carpeta = $carpeta.$nombre_nuevo;
	  //por fin movemos el archivo a la carpeta de imagenes
	  $mover_archivos = move_uploaded_file($imagen , $nombre_nuevo_con_carpeta);
	  //de damos permisos 777
	  chmod($nombre_nuevo_con_carpeta,0777);
///////////////////////////////////////////
// se agrega "fleImagen, extension_archivos y la fecha" a la consulta y dos extra %s separados por comas

  $insertSQL = sprintf("INSERT INTO usuarios (imagen, nombreusuario, usuario, password, derechos) VALUES (%s, %s, %s, %s, %s)",
  						GetSQLValueString($nombre_nuevo, "text"),
                       GetSQLValueString($_POST['nombreusuario'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['derechos'], "text"));

  mysql_select_db($database_capitaldeportiva, $capitaldeportiva);
  $Result1 = mysql_query($insertSQL, $capitaldeportiva) or die(mysql_error());
  }
  $insertGoTo = "listarusuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_capitaldeportiva, $capitaldeportiva);
$query_rsusuarios = "SELECT * FROM usuarios ORDER BY nombreusuario ASC";
$rsusuarios = mysql_query($query_rsusuarios, $capitaldeportiva) or die(mysql_error());
$row_rsusuarios = mysql_fetch_assoc($rsusuarios);
$totalRows_rsusuarios = mysql_num_rows($rsusuarios);
?>
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
                        	<form action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" method="post" name="form1" id="form1">
               				  <table border="0" cellpadding="2" cellspacing="0" width="715">
                    				<tr>
      									<td colspan="2" class="punteado"><div align="center">Agregar usuarios al directorio</div></td>
    								</tr>
                        			<tr>
                          				<td align="right" nowrap="nowrap" class="texto">Fotografia:</td>
                          				<td><input type="file" name="fleImagen" id="fleImagen" /></td>
                        			</tr>
                   	  				<tr>
   						  				<td align="right" nowrap="nowrap" class="texto">Nombre de Usuario:</td>
      									<td><input type="text" name="nombreusuario" value="" size="32" /></td>
   					  				</tr>
    								<tr valign="baseline">
                              			<td nowrap="nowrap" align="right" class="texto">Usuario:</td>
                              			<td><input type="text" name="usuario" value="" size="32" /></td>
                        			</tr>
                        			<tr valign="baseline">
                              			<td nowrap="nowrap" align="right" class="texto">Password:</td>
                              			<td><input type="text" name="password" value="" size="32" /></td>
                        			</tr>
                                    <tr valign="baseline">
                              			<td nowrap="nowrap" align="right" class="texto">Derechos:</td>
                              			<td><input type="text" name="derechos" value="" size="32" /></td>
                        			</tr>
                        			<tr valign="baseline">
                              			<td nowrap="nowrap" align="right">&nbsp;</td>
                              			<td><input type="submit" value="Insertar registro" /></td>
    								</tr>
  								</table>
  									<input type="hidden" name="MM_insert" value="form1" />
							</form>
                            <p align="center"><a href="listarusuarios.php" class="texto">Regresar</a></p>
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
<?php
mysql_free_result($rsusuarios);
?>
