<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Capital Deportiva Apodaca</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    
    <?php include('bootstrap.php') ?>
  </head>
  <body>
    <br><br><br>
    <div class="container-fluid">
      <h1 class="text-center display-4">Capital Deportiva</h1> <br><br>
    <!--Form-->
      <form action="acciones.php" method="POST">
        <div class="row">
        <!-- Col 1 --> <br>
          <div class="col-md-3 col-sm-12">
            <div class="card shadow_card" style="width: 18rem;" type="submit" name="InsertarRegistro" value="listararbitros">
              <img class="card-img-top" src="https://www.benditofutbol.com/files/article_main/uploads/2014/03/30/53383d3746505.jpg" alt="Card image cap">
              <button class="card-body btn_card" type="submit" name="InsertarRegistro" value="listararbitros">
                <p class="card-text text-center">Directorio de Árbitros</p>
              </button>
            </div><!--Fin card--> 
          </div><!--Fin columna-->
        <!-- Col 2 --> <br>
          <div class="col-md-3 col-sm-12">
            <div class="card shadow_card" style="width: 18rem;">
              <img class="card-img-top" src="https://www.solofondos.com/wp-content/uploads/2016/02/fondos-de-pantalla-de-futbol-jugadores.jpg" alt="Card image cap">
              <button class="card-body btn_card" type="submit" name="InsertarRegistro" value="listarequipos">
                <p class="card-text text-center">Directorio de Equipos</p>
              </button>
            </div><!--Fin card--> 
          </div><!--Fin columna-->
        <!-- Col 3 --> <br>
          <div class="col-md-3 col-sm-12">
            <div class="card shadow_card" style="width: 18rem;">
              <img class="card-img-top" src="http://www.cyberlinks.in/images/2.jpg" alt="Card image cap">
              <button class="card-body btn_card" type="submit" name="InsertarRegistro" value="listarempleados">
                <p class="card-text text-center">Directorio de Empleados</p>
              </button>
            </div><!--Fin card--> 
          </div><!--Fin columna-->
        <!-- Col 4 --> <br>
          <div class="col-md-3 col-sm-12">
            <div class="card shadow_card" style="width: 18rem;">
              <img class="card-img-top" src="https://images.pexels.com/photos/886465/pexels-photo-886465.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Card image cap">
              <button class="card-body btn_card" type="submit" name="InsertarRegistro" value="listarproveedores">
                <p class="card-text text-center">Directorio de Proveedores</p>
              </button>
            </div><!--Fin card--> 
          </div><!--Fin columna-->
        </div><!--Fin row-->
      </form>
    </div> <!--Fin container-->

    <!--
      <table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#516E96">
        
        <tr>
          <td bgcolor="#FFFFFF">
            <table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                      <td colspan="4" height="40"></td>
                    </tr>
                    <tr>
                      <td width="100" height="100"><div align="center"><button type="submit" name="InsertarRegistro" value="listararbitros"><img src="imagenes/tarjetas.png" width="100" height="100" alt="Arbitros" /></button></div></td>
                      <td width="100" height="100"><div align="center"><button type="submit" name="InsertarRegistro" value="listarequipos"><img src="imagenes/jugador.png" width="100" height="100" alt="Equipos" /></button></div></td>
                      <td width="100" height="100"><div align="center"><button type="submit" name="InsertarRegistro" value="listarempleados"><img src="imagenes/personal.png" width="100" height="100" alt="Equipos" /></button></div></td>
                      <td width="100" height="100"><div align="center"><button type="submit" name="InsertarRegistro" value="listarproveedores"><img src="imagenes/proveedor.png" width="100" height="100" alt="Equipos" /></button></div></td>
                    </tr>
                    <tr>
                      <td width="100" height="100"><div align="center" class="texto">Directorio de Arbitros</div></td>
                    1  <td width="100" height="100"> <div align="center" class="texto">Directorio de Equipos</div></td>
                      <td width="100" height="100"> <div align="center" class="texto">Directorio de Empleados</div></td>
                      <td width="100" height="100"> <div align="center" class="texto">Directorio de Proveedores</div></td>
                    </tr>
            </table>
          </td>
        
        
      </table>-->
  </body>
</html>
