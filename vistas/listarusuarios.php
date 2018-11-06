<?php require_once('Connections/capitaldeportiva.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($conn_vote,$theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn_vote,$theValue) : mysqli_escape_string($conn_vote,$theValue);

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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsusuarios = 20;
$pageNum_rsusuarios = 0;
if (isset($_GET['pageNum_rsusuarios'])) {
  $pageNum_rsusuarios = $_GET['pageNum_rsusuarios'];
}
$startRow_rsusuarios = $pageNum_rsusuarios * $maxRows_rsusuarios;

$hostname_capitaldeportiva = "localhost";
$database_capitaldeportiva = "capitaldeportiva";
$username_capitaldeportiva = "root";
$password_capitaldeportiva = "prodrdel76";
 
$con = mysqli_connect($hostname_capitaldeportiva, $username_capitaldeportiva,"");

$capitaldeportivo = mysqli_select_db($con,$database_capitaldeportiva);
//mysqli_select_db($database_capitaldeportiva, $capitaldeportiva);
$query_rsusuarios = "SELECT * FROM usuarios ORDER BY nombreusuario ASC";
$rsusuarios = mysqli_query($con,$query_rsusuarios) or die(mysqli_error());
$row_rsusuarios = mysqli_fetch_assoc($rsusuarios);
$totalRows_rsusuarios = mysqli_num_rows($rsusuarios);

if (isset($_GET['totalRows_rsusuarios'])) {
  $totalRows_rsusuarios = $_GET['totalRows_rsusuarios'];
} else {
  $all_rsusuarios = mysqli_query($con,$query_rsusuarios);
  $totalRows_rsusuarios = mysqli_num_rows($all_rsusuarios);
}
$totalPages_rsusuarios = ceil($totalRows_rsusuarios/$maxRows_rsusuarios)-1;

$queryString_rsusuarios = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsusuarios") == false && 
        stristr($param, "totalRows_rsusuarios") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsusuarios = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsusuarios = sprintf("&totalRows_rsusuarios=%d%s", $totalRows_rsusuarios, $queryString_rsusuarios);
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
                        <td width="200" valign="top"><?php require_once('menulateral.php'); ?></td>
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        <!-- CODIGO CUERPO PAGINA -->
                			<table border="0" cellpadding="2" cellspacing="0" width="715">
                     			<tr class="punteado">
                        			<td>NOMBRE</td>
                        			<td>USUARIO</td>
                                    <td>PASSWORD</td>
                        			<td>DERECHOS</td>
                        			<td colspan="3">OPERACION</td>
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
                      				<td><a href="detalleusuarios.php?recordID=<?php echo $row_rsusuarios['idusuario']; ?>"> <?php echo $row_rsusuarios['nombreusuario']; ?></a> </td>
                      				<td><?php echo $row_rsusuarios['usuario']; ?></td>
                      				<td><?php echo $row_rsusuarios['password']; ?></td>
                                    <td><?php echo $row_rsusuarios['derechos']; ?></td>
                      				<td><div align="center"><a href="agregarusuarios.php"><img src="imagenes/agregar.png" width="15" height="15" /></a></div></td>
                      				<td><div align="center"><a href="modificarusuarios.php?idusuario=<?php echo $row_rsusuarios['idusuario']; ?>"
                ><img src="imagenes/modificar.png" width="15" height="15" /></a></div></td>
                      				<td><div align="center"><a href="borrarusuarios.php?idusuario=<?php echo $row_rsusuarios['idusuario']; ?>"
                ><img src="imagenes/borrar.png" width="15" height="15" /></a></div></td>
                    			</tr>
    <?php } while ($row_rsusuarios = mysqli_fetch_assoc($rsusuarios)); ?>
							</table>
                    		<table border="0" align="center">
                      			<tr>
                        			<td><?php if ($pageNum_rsusuarios > 0) { // Show if not first page ?>
                            	<a href="<?php printf("%s?pageNum_rsusuarios=%d%s", $currentPage, 0, $queryString_rsusuarios); ?>">Primero</a>
                            	<?php } // Show if not first page ?></td>
                        			<td><?php if ($pageNum_rsusuarios > 0) { // Show if not first page ?>
                            	<a href="<?php printf("%s?pageNum_rsusuarios=%d%s", $currentPage, max(0, $pageNum_rsusuarios - 1), $queryString_rsusuarios); ?>">Anterior</a>
                            	<?php } // Show if not first page ?></td>
                        			<td><?php if ($pageNum_rsusuarios < $totalPages_rsusuarios) { // Show if not last page ?>
                            	<a href="<?php printf("%s?pageNum_rsusuarios=%d%s", $currentPage, min($totalPages_rsusuarios, $pageNum_rsusuarios + 1), $queryString_rsusuarios); ?>">Siguiente</a>
                            	<?php } // Show if not last page ?></td>
                        			<td><?php if ($pageNum_rsusuarios < $totalPages_rsusuarios) { // Show if not last page ?>
                            	<a href="<?php printf("%s?pageNum_rsusuarios=%d%s", $currentPage, $totalPages_rsusuarios, $queryString_rsusuarios); ?>">&Uacute;ltimo</a>
                            	<?php } // Show if not last page ?></td>
                      			</tr>
                			</table>
                            <p align="center"><a href="listarusuarios.php" class="texto">Regresar</a></p>
                        <!-- CODIGO CUERPO PAGINA -->
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
mysqli_free_result($rsusuarios);
?>

