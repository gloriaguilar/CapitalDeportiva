<?php

class ControllerEmpleado{

    public function MostrarEmpleados()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
    
        $consultarEmpleados="SELECT * FROM personal";
        $resulEmpleados=$conexion->ExecuteQuery($consultarEmpleados) or die ("ERROR AL TRAER EMPLEADOS");
    
        while($colEmpleados=$resulEmpleados->fetch_array())
        {
            echo "
            <form action='../acciones.php' method='POST'>
            <tr bgcolor='#FFFFF' class='texto'>
            <td><img src='../".$colEmpleados['imagen']."' width='100' height='100' /></td>
            <td>".$colEmpleados['nombreempleado']."</td>
            <td>".$colEmpleados['puesto']."</td>
            <td>".$colEmpleados['telefono']."</td>
            <td>".$colEmpleados['celular']."</td>
            <td>".$colEmpleados['celular']."</td>
            <input type='hidden' name='idEmpleado' value='".$colEmpleados['idempleado']."'/>
            <td><div align='center'><button type='submit' name='InsertarRegistro' value='modificarempleados'>
            <img src='../imagenes/modificar.png' width='15' height='15' /></button></div></td>
            <td><div align='center'><button type='submit' name='InsertarRegistro' value='borrarempleados'>
            <img src='../imagenes/borrar.png' width='15' height='15' /></button></div></td>
      </tr>
      </form>";
        }
    }
    
    public function ModificarEmpleados($idEmpleado,$imagen,$nombreEmpleado,$puesto,$tel,$cel,$mail,$conexion)
    {
        echo "
        <table width='950' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#516E96'>
        <tr>
          <td ><img src='imagenes/baner.png' alt='Capital Deporiva Apodaca' width='950' height='200' /></td>
        </tr>
        <tr>
          <td bgcolor='#FFFFFF' height='7'><img src='imagenes/linea.png' /></td>
        </tr>
        <tr>
          <td bgcolor='#FFFFFF'>
              <table width='950' border='0'>
                <tr>
                      <td rowspan='3' width='5'>&nbsp;</td>
                      <td colspan='3' height='20'>&nbsp;</td>
                      <td rowspan='3' width='5'>&nbsp;</td>
                </tr>
                <tr>
                      <td width='200' valign='top'><?php require_once('menulateral.php'); ?></td>
                      <td width='2'>&nbsp;</td>
                      <td width='715' valign='top'>
                          <form action='acciones.php' enctype='multipart/form-data' method='post'>
                  <table border='0' cellpadding='2' cellspacing='0' width='715'>
                          <tr>
                            <td colspan='2' class='punteado'><div align='center'>Modificar datos de empleados en el directorio</div></td>
                          </tr>
                          <tr>
                                        <td colspan='2' nowrap='nowrap' class='texto'>
                                          <div align='left'>
                                                <p>La fotografia que subas debe de ser maximo de 2MB (Para que no tengas problemas es recomendable que sean fotos<br />
                                               tomadas con celulares).</p>
                                          </div>
                                         </td>
                                     </tr>
                          <tr>
                                <td align='right' nowrap='nowrap' class='texto'>Fotografia:</td>
                                <td><input type='file' name='fleImagen' id='fleImagen' /></td>
                          </tr>
                            <tr valign='baseline'>
                                <td align='right' nowrap='nowrap' class='texto'>Nombre del Empleado:</td>
                                <td><input type='text' value='$nombreEmpleado' name='nombrEmpleadp' size='32' /></td>
                                <td><input type='hidden' name='idEmpleado' value='$idEmpleado' /></td>
                          </tr>
                          <tr valign='baseline'>
                                <td nowrap='nowrap' align='right'><span class='texto'>Puesto</span>:</td>
                                <td><input type='text' value='$puesto' name='puestoEmpleado' size='32' /></td>
                          </tr>
                          <tr valign='baseline'>
                                <td nowrap='nowrap' align='right'><span class='texto'>Telefono</span>:</td>
                                <td><input type='text' value='$tel' name='telEmpleado' size='32' /></td>
                          </tr>
                          <tr valign='baseline'>
                                <td align='right' nowrap='nowrap' class='texto'>Celular:</td>
                                <td><input type='text' value='$cel' name='celEmpleado' size='32' /></td>
                          </tr>
                          <tr valign='baseline'>
                                <td align='right' nowrap='nowrap' class='texto'>Correo:</td>
                                <td><input type='text' value='$mail' name='mailEmpleado' size='32' /></td>
                          </tr>
                          <tr valign='baseline'>
                                <td nowrap='nowrap' align='right'>&nbsp;</td>
                                <td><input type='submit' value='Actualizar registro'  name='InsertarRegistro' value='enviarEmpleado'/></td>
                           </tr>
                  </table>                
                  </form>
                          <p align='center'><a href='listarempleados.php' class='texto'>Regresar</a></p>
                      </td>
                    </tr>
                <tr>
                  <td colspan='3' height='20'>&nbsp;</td>
                 </tr>
          </table>";
    }
        public function TraerEmpleado($id,$conexion)
        {
            $conexion->ConexionBD();
            $consultaEmpleadp="SELECT * FROM personal WHERE idempleado='$id'";
            $resEmpleado=$conexion->ExecuteQuery($consultaEmpleadp) or die ("Error al traer empleado");
    
            while($colEmpleado=$resEmpleado->fetch_array())
            {
                $id=$colEmpleado['idempleado'];
                $imagen=$colEmpleado['imagen'];
                $nombre=$colEmpleado['nombreempleado'];
                $puesto=$colEmpleado['puesto'];
                $tel=$colEmpleado['telefono'];
                $cel=$colEmpleado['celular'];
                $mail=$colEmpleado['correo'];
            }
            self::ModificarEmpleados($id,$imagen,$nombre,$puesto,$tel,$cel,$mail,$conexion);
        }
        public function ActualizarEmpleado($id,$imagen,$nombre,$puesto,$tel,$cel,$mail,$conexion)
        {

            $conexion->ConexionBD();
            $ActualizarEmpleado="UPDATE personal SET imagen='$imagen',nombreempleado='$nombre',puesto='$puesto',
            telefono='$tel',celular='$cel',correo='$mail' WHERE idempleado='$id'";
            $resActualizar=$conexion->ExecuteQuery($ActualizarEmpleado) or die ("Error al actualizar");
    
        }
        public function EliminarEmpleado($id,$conexion)
        {

            $conexion->ConexionBD();
            $eliminarEmpleado="DELETE FROM personal WHERE idempleado='$id'";
            $resEliminarEmpleado=$conexion->ExecuteQuery($eliminarEmpleado) or die ("No se pudo eliminar empleado");
    
        }
        public function InsertarEmpleado($imagen,$nombre,$puesto,$tel,$cel,$mail,$conexion)
        {
            $conexion->ConexionBD();
            $insertarEmpleadp="INSERT INTO personal(idempleado,imagen,nombreempleado,puesto,telefono,celular,correo) 
            VALUES (null,'$imagen','$nombre','$puesto','$tel','$cel','$mail')";
            $resInsertarEmpleado=$conexion->ExecuteQuery($insertarEmpleadp) or die ("Error al insertar empleado");
        }
}

?>