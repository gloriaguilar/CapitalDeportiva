<?php require_once('Connections/capitaldeportiva.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

  $insertSQL = sprintf("INSERT INTO jugadores (imagen, nombrejugador, nombreequipo) VALUES (%s, %s, %s)",
                       GetSQLValueString($nombre_nuevo, "text"),
                       GetSQLValueString($_POST['nombrejugador'], "text"),
                       GetSQLValueString($_POST['nombreequipo'], "text"));

  mysql_select_db($database_capitaldeportiva, $capitaldeportiva);
  $Result1 = mysql_query($insertSQL, $capitaldeportiva) or die(mysql_error());
  }
  $insertGoTo = "agregarjugadores.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_capitaldeportiva, $capitaldeportiva);
$query_rsEquipo = "SELECT * FROM equipos ORDER BY nombreequipo ASC";
$rsEquipo = mysql_query($query_rsEquipo, $capitaldeportiva) or die(mysql_error());
$row_rsEquipo = mysql_fetch_assoc($rsEquipo);
$totalRows_rsEquipo = mysql_num_rows($rsEquipo);

mysql_select_db($database_capitaldeportiva, $capitaldeportiva);
$query_rsJugadores = "SELECT * FROM jugadores ORDER BY nombreequipo ASC";
$rsJugadores = mysql_query($query_rsJugadores, $capitaldeportiva) or die(mysql_error());
$row_rsJugadores = mysql_fetch_assoc($rsJugadores);
$totalRows_rsJugadores = mysql_num_rows($rsJugadores);
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
<body bgcolor="#006699">
	<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
  		<tr>
    		<td ><img src="imagenes/baner.png" alt="Capital Deporiva Apodaca" width="950" height="200" /></td>
  		</tr>
  		<tr>
    		<td bgcolor="#FFFFFF" height="7"><img src="imagenes/linea.png" /></td>
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
                        <td width="200" valign="top"> <img src="imagenes/lateraljugadores.png" alt="Capital Deporiva Apodaca" width="200" height="500" /></td>
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        	<form action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" method="post" name="form1" id="form1">
                          	<table border="0" cellpadding="2" cellspacing="0" width="715" class="punteado2">
                    			<tr>
      								<td colspan="2" class="punteado"><div align="center">Agregar jugadores al directorio</div></td>
    							</tr>
                        		<tr>
                          			<td colspan="2" nowrap="nowrap" class="texto">
                                        <div align="left">
                              			<p>La fotografia que subas debe de ser maximo de 2MB (Para que no tengas problemas es recomendable que sean fotos<br />
                                          tomadas con celulares), Debes de agregar de jugador por jugados hasta completar tu registro de 20 jugadores.</p>
                                         </div>
                       	    		</td>
                       			</tr>
                                <tr valign="baseline">
                              		<td nowrap="nowrap" align="right" valign="middle">Ejemplo de foto:</td>
                              		<td> <img src="imagenes/agregarjugador.png" alt="Capital Deporiva Apodaca" width="100" height="120" /></td>
                            	</tr>
                            	<tr valign="baseline">
                              		<td nowrap="nowrap" align="right" valign="top">Fotografia:</td>
                              		<td><input type="file" name="fleImagen" id="fleImagen" /></td>
                            	</tr>
                            	<tr valign="baseline">
                              		<td nowrap="nowrap" align="right">Nombre de Jugador:</td>
                              		<td><input type="text" name="nombrejugador" value="" size="32" /></td>
                            	</tr>
                            	<tr valign="baseline">
                              		<td nowrap="nowrap" align="right">Nombre de Equipo:</td>
                              		<td><select name="nombreequipo">
                                		<?php 
											do {  
										?>
                                		<option value="<?php echo $row_rsEquipo['nombreequipo']?>" <?php if (!(strcmp($row_rsEquipo['nombreequipo'], $row_rsEquipo['nombreequipo']))) {echo "SELECTED";} ?>><?php echo $row_rsEquipo['nombreequipo']?></option>
                                		<?php
											} while ($row_rsEquipo = mysql_fetch_assoc($rsEquipo));
										?>
                              		</select></td>
                            	</tr>
                            	<tr valign="baseline">
                              		<td nowrap="nowrap" align="right">&nbsp;</td>
                              		<td><input type="submit" value="Insertar registro" /></td>
                            	</tr>
                          </table>
                          <input type="hidden" name="MM_insert" value="form1" />
                        </form>
                        <br />
                         <!-- </p><p align="center"><a href="listarjugadores.php" class="texto">Regresar</a></p> -->
                         <!-- Liatado de jugadores -->
                         <table border="0" cellpadding="2" cellspacing="0" width="715">
                           <tr>
                             
                             
                             <td class="punteado"> <div align="center">Nombre de Jugador </div></td>
                             <td class="punteado"> <div align="center">Equipo </div></td>
                             <td class="punteado"> <div align="center">Fotografia </div></td>
                           </tr>
                           <?php
										$counter=0;
										$counter=1;
									do {
										if($counter==0)
										{ $color="#D5E7FB";
										$counter=1; }
 									else
										{$color="#E8F2FC";
  										$counter=0; } echo "<tr bgcolor='$color' class='texto'>";?>
                               
                               
                               <td><?php echo $row_rsJugadores['nombrejugador']; ?></td>
                               <td><?php echo $row_rsJugadores['nombreequipo']; ?></td>
                               <td><?php echo $row_rsJugadores['imagen']; ?></td>
                             </tr>
                             <?php } while ($row_rsJugadores = mysql_fetch_assoc($rsJugadores)); ?>
                         </table>
                         <!-- Liatado de jugadores -->
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
mysql_free_result($rsEquipo);

mysql_free_result($rsJugadores);
?>
