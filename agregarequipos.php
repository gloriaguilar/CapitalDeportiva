<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Capital Deportiva Apodaca</title>
      <?php include('bootstrap.php') ?>
</head>
<body>
      <!-- necesita el emnu lateral -->
      <br><br>
      <div class="container-fluid">
            <h1 class="text-center">Agregar equipo</h1><br>
            <div class="container">
                  <form action="acciones.php" method="post">
                        <div class="form-group">
                              <label>Nombre del equipo</label>
                              <input type="text" name="nombreequipo" value="" class="form-control" required/>
                        </div>
                        <div class="form-group">
                              <div class="row">
                                    <div class="col-md-6">
                                          <label>Categoría</label>
                                          <?php
                                                require("Controllers/controllerEquipo.php");
                                                ControllerEquipo::MostrarCategorias();
                                          ?>
                                    </div>
                                    <div class="col-md-6">
                                          <label>Rama</label>
                                          <?php ControllerEquipo::MostrarRamas(); ?>
                                    </div>
                              </div>
                        </div>
                        <div class="form-group">
                              <label>Entrenador</label>
                              <input type="text" name="entrenador" value="" class="form-control" required/>
                        </div>
                        <div class="form-group">
                              <div class="row">
                                    <div class="col-md-6">
                                          <label>Teléfono</label>
                                          <input type="text" name="telefono" value="" class="form-control" required/>   
                                    </div>
                                    <div class="col-md-6">
                                          <label>Celular</label>
                                          <input type="text" name="celular" value="" class="form-control" required/>
                                    </div>
                              </div>
                              
                        </div>
                        <div class="form-group">
                              <label>Correo</label>
                              <input type="email" name="correo" value="" class="form-control" required/>
                        </div>
                        <button type="submit" name='InsertarRegistro'class="btn btn-outline-info right m-2" value='insertarEquipo' value="Insertar registro">Guardar</button>
                  </form>
                  <p><a href="vistas/listarequipos.php" class="btn btn-outline-dark right m-2">Regresar</a></p>
            </div>
      </div>


      <!--
	<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
  		
  		<tr>
    		<td bgcolor="#FFFFFF">
    			<table width="950" border="0">
                  	<tr>
                        <td rowspan="3" width="5">&nbsp;</td>
                        <td colspan="3" height="20">&nbsp;</td>
                        <td rowspan="3" width="5">&nbsp;</td>
                  	</tr>
                  	<tr>
                        <td width="200" valign="top"><?php// require_once('menulateral.php'); ?></td>
                        <td width="2">&nbsp;</td>
                        <td width="715" valign="top">
                        	<form action="acciones.php" method="post">
                			<table border="0" cellpadding="2" cellspacing="0" width="715">
                    			<tr>
                                         <td colspan="2" class="punteado"><div align="center">Agregar equipos al directorio</div></td>
                                    </tr>
                      			<tr valign="baseline">
                                          <td nowrap="nowrap" align="right"><span class="texto">Nombre del equipo</span>:</td>
                                          <td><input type="text" name="nombreequipo" value="" size="32" /></td>
                      			</tr>
                             	<tr valign="baseline">
                                 	<td nowrap="nowrap" align="right"><span class="texto">Categoría</span>:</td>
                                    <?php
                                      require("Controllers/controllerEquipo.php");
                                      ControllerEquipo::MostrarCategorias();
                                    ?>
                             	</tr>
                             	<tr> 
                         	</tr>
                            <tr valign="baseline">
                              <?php ControllerEquipo::MostrarRamas(); ?>
                         	</tr> 
                            <tr valign="baseline">
                                 <td nowrap="nowrap" align="right"><span class="texto">Entrenador</span>:</td>
                                 <td><input type="text" name="entrenador" value="" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                                  <td nowrap="nowrap" align="right"><span class="texto">Teléfono</span>:</td>
                                  <td><input type="text" name="telefono" value="" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                                  <td nowrap="nowrap" align="right"><span class="texto">Celular</span>:</td>
                                  <td><input type="text" name="celular" value="" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                                  <td nowrap="nowrap" align="right"><span class="texto">Correo</span>:</td>
                                  <td><input type="text" name="correo" value="" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                                  <td nowrap="nowrap" align="right">&nbsp;</td>
                                  <td><input type="submit" name='InsertarRegistro' value='insertarEquipo' value="Insertar registro" /></td>   
                   	  		</tr>
						</table>
                    	<input type="hidden" name="MM_insert" value="form1"/>
                    	</form>
                            <p align="center"><a href="vistas/listarequipos.php" class="texto">Regresar</a></p>
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
