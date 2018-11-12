<?php

class ControllerProvedor{

    /**
     * Muestra proveedores en la tabla
     */
    public function MostrarProveedores(){
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
    
        $consultaProvedorees="SELECT * FROM proveedores";
        $resProveedores=$conexion->ExecuteQuery($consultaProvedorees) or die ("Error al traer provedorees");
    
        while($colProvedores=$resProveedores->fetch_array())
        {
            echo "
                <form action='../acciones.php' method='POST'>
                    <tr>
                        <td class='middle'>".$colProvedores['nombreproveedor']."</td>
                        <input type='hidden' value='".$colProvedores['idproveedor']."' name='idEquipo'>
                        <td class='middle'>".$colProvedores['direccion']."</td>
                        <td class='middle'>".$colProvedores['rfc']."</td>
                        <td class='middle'>".$colProvedores['contacto']."</td>
                        <td class='middle'>".$colProvedores['correo']."</td>
                        <td class='middle'>".$colProvedores['paginaweb']."</td>
                        <td class='middle'><button type='submit' name='InsertarRegistro' class='btn btn-light text-center' value='modificarProvedor'><img src='../imagenes/modificar.png' width='15' height='15' /></button></td>
                        <td class='middle'><button type='submit' name='InsertarRegistro' class='btn btn-light text-center'  value='borrarProvedor'><img src='../imagenes/borrar.png' width='15' height='15' /></button></td>
                    </tr>
                </form>
            ";
        }
    }

    public function AgregarProveedor($nombre,$direccion,$rfc,$contacto,$correo,$paginaweb,$conexion){
        $conexion->ConexionBD();

        $insertarProvedores="INSERT INTO proveedores(idproveedor, nombreproveedor, direccion,rfc, contacto, correo, paginaweb)
         VALUES (null,'$nombre','$direccion','$rfc','$contacto','$correo','$paginaweb')";
         $resultadoInsertar=$conexion->ExecuteQuery($insertarProvedores) or die ("Error al insertar provedores");
    }

    public function EliminarProvedor($idProvedor,$conexion){
        $conexion->ConexionBD();
        $EliminarProvedor="DELETE FROM proveedores WHERE idproveedor='$idProvedor'";
        $resultadoEliminar=$conexion->ExecuteQuery($EliminarProvedor) or die ("Error al elimianr proveedor");
    }

    /**
     * Consulta para modificar proveedor
     */
    public function RecolectaProvedor($id,$conexion){
        $conexion->ConexionBD();
        $recolectarProvedor="SELECT * FROM proveedores WHERE idproveedor='$id'";
        $resultadoRecolectar=$conexion->ExecuteQuery($recolectarProvedor) or die ("Error al recolectar");

        while($colProvedor=$resultadoRecolectar->fetch_array())
        {
            $idProvedor=$colProvedor['idproveedor'];
            $nombreProvedor=$colProvedor['nombreproveedor'];
            $direccion=$colProvedor['direccion'];
            $rfc=$colProvedor['rfc'];
            $contacto=$colProvedor['contacto'];
            $paginaweb=$colProvedor['paginaweb'];
            $correo=$colProvedor['correo'];
        }
        self::ModificarProvedor($idProvedor,$nombreProvedor,$direccion,$rfc,$contacto,$correo,$paginaweb);
    }

    /**
     * Vista de modificar proveedor
     */
    public function ModificarProvedor($id,$nombre,$direccion,$rfc,$contacto,$correo,$paginaWeb){
        echo "
            <br><br><br>
            <div class='container-fluid'>
                <h1 class='text-center'>Editar información del proveedor</h1><br>
                <div class='container'>
                    <form action='acciones.php' enctype='multipart/form-data' method='POST'>
                        <div class='form-group'>
                            <label>Nombre de proveedor</label>
                            <input type='text' name='nombreproveedor' value='".$nombre."' class='form-control'/>
                        </div>
                        <div class='form-group'>
                            <label>Direccion</label>
                            <input type='text' name='direccion' value='".$direccion."' class='form-control'/>
                        </div>
                        <div class='form-group'>
                            <label>RFC</label><br>
                            <input type='text' name='rfc' value='".$rfc."' class='form-control uppercase'/>
                        </div>
                        <div class='form-group'>
                            <label>Contacto</label><br>
                            <input type='text' name='contacto' value='".$contacto."' class='form-control'/>
                        </div>
                        <div class='form-group'>
                            <label>Correo</label><br>
                            <input type='email' name='correo' value='".$correo."' class='form-control'/>
                        </div>
                        <div class='form-group'>
                            <label>Página Web</label><br>
                            <input type='text' name='paginaweb' value='".$paginaWeb."' class='form-control'/>
                        </div>
                        <input type='submit' class='btn btn-outline-info right m-2' name='InsertarRegistro' value='actualizrProvedor' />
                        <input type='hidden' value='form1' />
                        <input type='hidden' name='idproveedor' value='".$id."'/>
                    </form>
                    <a href='vistas/listarproveedores.php' class='btn btn-outline-dark right m-2'>Regresar</a> 			
                </div>
            </div>
        ";

        // <table width='950' border='0'>
            //         <tr>
            //             <td rowspan='3' width='5'>&nbsp;</td>
            //             <td colspan='3' height='20'>&nbsp;</td>
            //             <td rowspan='3' width='5'>&nbsp;</td>
            //         </tr>
            //         <tr>
            //             <td width='200' valign='top'><?php require_once('menulateral.php'); ></td>
            //             <td width='2'>&nbsp;</td>
            //             <td width='715' valign='top'>
            //                 <form action='acciones.php' method='post'>
            //                     <table border='0' cellpadding='2' cellspacing'0' width='715'>
            //                         <tr>
            //                             <td colspan='2' class='punteado'><div align='center'>Modificar datos de proveedores en el directorio</div></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td align='right' nowrap='nowrap' class='texto'>Nombre del Proveedor:</td>
            //                             <td><input type='text' name='nombreproveedor' value='".$nombre."' size='32' /></td>
                                
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'><span class='texto'>Dirección:</span></td>
            //                             <td><input type='text' name='direccion' value='".$direccion."' size='32' /></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td align='' nowrap='nowrap' class='texto'>Estado:</td>
            //                             <td><input type='text' name='estado' value='".$estado."' size='2' /></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'><span class='texto'>R. F. C. :</span></td>
            //                             <td><input type='text' name='rfc' value='".$rfc."' size='32' /></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'><span class='texto'>Contacto:</span></td>
            //                             <td><input type='text' name='contacto' value='".$contacto."' size='32' /></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'><span class='texto'>Correo:</span></td>
            //                             <td><input type='text' name='correo' value='".$correo."' size='32' /></td>
            //                         </tr>
            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'><span class='texto'>Página Web:</span></td>
            //                             <td><input type='text' name='paginaweb' value='".$paginaWeb."' size='32' /></td>
            //                         </tr>

            //                         <tr valign='baseline'>
            //                             <td nowrap='nowrap' align='right'>&nbsp;</td>
            //                             <td><input type='submit' name='InsertarRegistro' value='actualizrProvedor' /></td>
            //                         </tr>
            //                     </table>
            //                         <input type='hidden' value='form1' />
            //                         <input type='hidden' name='idproveedor' value='".$id."'/>
            //                 </form>
            //                     <p align='center'><a href='vistas/listarproveedores.php' class='texto'>Regresar</a></p>
            //             </td>
        //         </tr>
    }

    public function ActualizarProvedor($id,$nombre,$direccion,$rfc,$contacto,$correo,$paginaweb,$conexion)
    {
        $conexion->ConexionBD();
        $actualizarProvedor="UPDATE proveedores SET nombreproveedor='$nombre',direccion='$direccion',rfc='$rfc',contacto='$contacto',
        correo='$correo',paginaweb='$paginaWeb' WHERE idproveedor='$id'";
        $resultadoActualizar=$conexion->ExecuteQuery($actualizarProvedor) or die ("Error al actualizar proveedor");
        $conexion->Cerrarbd();

    }


}
?>