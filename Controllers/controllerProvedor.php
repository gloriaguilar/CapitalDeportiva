<?php

class ControllerProvedor{

    public function MostrarProveedores()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
    
        $consultaProvedorees="SELECT * FROM proveedores";
        $resProveedores=$conexion->ExecuteQuery($consultaProvedorees) or die ("Error al traer provedorees");
    
        while($colProvedores=$resProveedores->fetch_array())
        {
            echo "
            <form action='../acciones.php' method='POST'>
            <tr bgcolor='#fffff' class='texto'>
            <td>".$colProvedores['nombreproveedor']."</td>
            <input type='hidden' value='".$colProvedores['idproveedor']."' name='idEquipo'>
            <td>".$colProvedores['direccion']."</td>
            <td>".$colProvedores['estado']."</td>
            <td>".$colProvedores['rfc']."</td>
            <td>".$colProvedores['contacto']."</td>
            <td>".$colProvedores['correo']."</td>
            <td>".$colProvedores['paginaweb']."</td>
            <td><button type='submit' name='InsertarRegistro' value='modificarProvedor'><img src='../imagenes/modificar.png' width='15' height='15' /></button></td>
            <td><button type='submit' name='InsertarRegistro'  value='borrarProvedor'><img src='../imagenes/borrar.png' width='15' height='15' /></button></td>
            </tr>
            </form>";
        }
    }
    public function AgregarProveedor($nombre,$estado,$direccion,$rfc,$contacto,$correo,$paginaweb,$conexion)
    {
        $conexion->ConexionBD();

        $insertarProvedores="INSERT INTO proveedores(idproveedor, nombreproveedor, direccion, estado, rfc, contacto, correo, paginaweb)
         VALUES (null,'$nombre','$direccion','$estado','$rfc','$contacto','$correo','$paginaweb')";
         $resultadoInsertar=$conexion->ExecuteQuery($insertarProvedores) or die ("Error al insertar provedores");
    }

    public function EliminarProvedor($idProvedor,$conexion)
    {
        $conexion->ConexionBD();
        $EliminarProvedor="DELETE FROM proveedores WHERE idproveedor='$idProvedor'";
        $resultadoEliminar=$conexion->ExecuteQuery($EliminarProvedor) or die ("Error al elimianr proveedor");
    }
    public function RecolectaProvedor($id,$conexion)
    {
        $conexion->ConexionBD();
        $recolectarProvedor="SELECT * FROM proveedores WHERE idproveedor='$id'";
        $resultadoRecolectar=$conexion->ExecuteQuery($recolectarProvedor) or die ("Error al recolectar");

        while($colProvedor=$resultadoRecolectar->fetch_array())
        {
            $idProvedor=$colProvedor['idproveedor'];
            $nombreProvedor=$colProvedor['nombreproveedor'];
            $direccion=$colProvedor['direccion'];
            $estado=$colProvedor['estado'];
            $rfc=$colProvedor['rfc'];
            $contacto=$colProvedor['contacto'];
            $paginaweb=$colProvedor['paginaweb'];
            $correo=['correo'];
        }
        self::ModificarProvedor($idProvedor,$nombreProvedor,$direccion,$estado,$rfc,$contacto,$correo,$paginaweb);
    }
    public function ModificarProvedor($id,$nombre,$direccion,$estado,$rfc,$contacto,$correo,$paginaWeb)
    {
        echo "
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
                    <form action='acciones.php' method='post'>
                        <table border='0' cellpadding='2' cellspacing'0' width='715'>
                            <tr>
                                  <td colspan='2' class='punteado'><div align='center'>Modificar datos de proveedores en el directorio</div></td>
                            </tr>
                              <tr valign='baseline'>
                                  <td align='right' nowrap='nowrap' class='texto'>Nombre del Proveedor:</td>
                                  <td><input type='text' name='nombreproveedor' value='".$nombre."' size='32' /></td>
                          
                            </tr>
                            <tr valign='baseline'>
                                  <td nowrap='nowrap' align='right'><span class='texto'>Dirección:</span></td>
                                  <td><input type='text' name='direccion' value='".$direccion."' size='32' /></td>
                            </tr>
                            <tr valign='baseline'>
                                  <td align='' nowrap='nowrap' class='texto'>Estado:</td>
                                  <td><input type='text' name='estado' value='".$estado."' size='2' /></td>
                            </tr>
                            <tr valign='baseline'>
                                  <td nowrap='nowrap' align='right'><span class='texto'>R. F. C. :</span></td>
                                  <td><input type='text' name='rfc' value='".$rfc."' size='32' /></td>
                            </tr>
                            <tr valign='baseline'>
                                  <td nowrap='nowrap' align='right'><span class='texto'>Contacto:</span></td>
                                  <td><input type='text' name='contacto' value='".$contacto."' size='32' /></td>
                            </tr>
                            <tr valign='baseline'>
                                 <td nowrap='nowrap' align='right'><span class='texto'>Correo:</span></td>
                                  <td><input type='text' name='correo' value='".$correo."' size='32' /></td>
                            </tr>
                            <tr valign='baseline'>
                                  <td nowrap='nowrap' align='right'><span class='texto'>Página Web:</span></td>
                                  <td><input type='text' name='paginaweb' value='".$paginaWeb."' size='32' /></td>
                            </tr>

                            <tr valign='baseline'>
                                  <td nowrap='nowrap' align='right'>&nbsp;</td>
                                  <td><input type='submit' name='InsertarRegistro' value='actualizrProvedor' /></td>
                             </tr>
                        </table>
                            <input type='hidden' value='form1' />
                              <input type='hidden' name='idproveedor' value='".$id."'/>
                    </form>
                        <p align='center'><a href='listarproveedores.php' class='texto'>Regresar</a></p>
                </td>
              </tr>";
    }

    public function ActualizarProvedor($id,$nombre,$direccion,$estado,$rfc,$contacto,$correo,$paginaweb,$conexion)
    {
        $conexion->ConexionBD();
        $actualizarProvedor="UPDATE proveedores SET nombreproveedor='$nombre',direccion='$direccion',estado='$estado',rfc='$rfc',contacto='$contacto',
        correo='$correo',paginaweb='$paginaWeb' WHERE idproveedor='$id'";
        $resultadoActualizar=$conexion->ExecuteQuery($actualizarProvedor) or die ("Error al actualizar proveedor");
        $conexion->Cerrarbd();

    }


}
?>