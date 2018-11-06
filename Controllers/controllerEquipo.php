<?php
class ControllerEquipo{

    public function MostrarEquipo()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
    
        $consultaEquipo="SELECT * FROM equipos";
        $resConsulta=$conexion->ExecuteQuery($consultaEquipo) or die ("Error al traer equipos");
    
        while($colEquipos=$resConsulta->fetch_array())
        {
            echo "
            <form action='../acciones.php' method='POST'>
            <tr bgcolor='#fffff' class='texto'>
            <td>".$colEquipos['nombreequipo']."</td>
            <input type='hidden' value='".$colEquipos['idequipo']."' name='idEquipo'>
            <td>".$colEquipos['entrenador']."</td>
            <td>".$colEquipos['rama']."</td>
            <td>".$colEquipos['categoria']."</td>
            <td>".$colEquipos['telefono']."</td>
            <td>".$colEquipos['celular']."</td>
            <td>".$colEquipos['correo']."</td>
            <td><button type='submit' name='InsertarRegistro' value='modificarequipos'><img src='../imagenes/modificar.png' width='15' height='15' /></button></td>
            <td><button type='submit' name='InsertarRegistro' value='borrarequipos'><img src='../imagenes/borrar.png' width='15' height='15' /></button></td>
            </tr>
            </form>";
        }
    }
    public function recolectaEquipo($idEquipo,$conexion)
    {

        $conexion->ConexionBD();
    
        $consultaEquipo="SELECT * FROM equipos where idequipo='$idEquipo'";
        $resEquipo=$conexion->ExecuteQuery($consultaEquipo) or die ("Error al traer equipo por id");
    
        while($colidEquipo=$resEquipo->fetch_array())
        {
             $id=$colidEquipo['idequipo'];
             $nombreEquipo=$colidEquipo['nombreequipo'];
             $categoria=$colidEquipo['categoria'];
             $rama=$colidEquipo['rama'];
             $entrenador=$colidEquipo['entrenador'];
             $telefono=$colidEquipo['telefono'];
             $celular=$colidEquipo['celular'];
             $correo=$colidEquipo['correo'];
        }
        self::ModificarEquipo($id,$nombreEquipo,$categoria,$rama,$entrenador,$telefono,$celular,$correo,$conexion);
    }
    
    public function ModificarEquipo($id,$nombre,$cat,$rama,$entrenador,$tel,$cel,$mail,$conexion)
    {
    echo "
        <table width='950' border='0'
        <tr>
        <td rowspan='3' width='5'>&nbsp;</td>
        <td colspan='3' height='20'>&nbsp;</td>
        <td rowspan='3' width='5'>&nbsp;</td>
        </tr>
        <tr>
        <td width='200' valign='top'><?php require_once('menulateral.php'); ?></td>
        <td width='2'>&nbsp;</td>
        <td width='715' valign='top'>
            <form action='' method='post' name='form1' id='form1'>
            <table border='0' cellpadding='2' cellspacing='0' width='715'>
                <tr>
                        <td colspan='2' class='punteado'><div align='center'>Modificar datos de equipos en el directorio</div></td>
                </tr>
                    <tr valign='baseline'>
                    <td align='right' nowrap='nowrap' class='texto'>'Nombre del Equipo:</td>
                    <td><input type='text' name='nombreequipo' value='$nombre' size='32' /></td>
                    <td><input type='hidden' name='idEquipo' value='$id' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td nowrap='nowrap' align='right'><span class='texto'>Categoria</span>:</td>
                    <td><input type='text' name='categoria' value='$cat' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td nowrap='nowrap' align='right'><span class='texto'>Rama</span>:</td>
                    <td><input type='text' name='rama' value='$rama' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td align='right' nowrap='nowrap'><span class='texto'>Entrenador</span>:</td>
                    <td><input type='text' name='entrenador' value='$entrenador' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td align='right' nowrap='nowrap'><span class='texto'>Telefono</span>:</td>
                    <td><input type='text' name='telefono' value='$tel' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td align='right' nowrap='nowrap'><span class='texto'>Celular</span>:</td>
                    <td><input type='text' name='celular' value='$cel' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td align='right' nowrap='nowrap'><span class='texto'>Correo</span>:</td>
                    <td><input type='text' name='correo' value='$mail' size='32' /></td>
                </tr>
                <tr valign='baseline'>
                    <td nowrap='nowrap' align='right'>&nbsp;</td>
                    <td><input type='submit' value='Actualizar registro' name='InsertarRegistro' value='enviarEquipo'/></td>
                </tr>
            </table>
        ";
    }
    public function ActualizarEquipo($id,$nombre,$cat,$rama,$entrenador,$tel,$cel,$mail,$conexion)
    {

        $conexion->ConexionBD();
        $actualizarEquipo="UPDATE equipos set nombreequipo='$nombre',categoria='$cat',
        rama='$rama',entrenador='$entrenador', telefono='$tel', celular='$cel', correo='$mail' WHERE idequipo='$id'";
        $resulArbitro=$conexion->ExecuteQuery($actualizarEquipo);
    }
    public function BorrarEquipos($idEquipo,$conexion)
    {
        $conexion->ConexionBD();
        $borrarEquipo="DELETE FROM equipos  WHERE idequipo='$idEquipo'";
        $resBorrarEquipo=$conexion->ExecuteQuery($borrarEquipo) or die ("Error al eliminar Equipo");
    }

    public function MostrarCategorias()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
        $consultarCategorias="SELECT * FROM categorias";
        $resCategorias=$conexion->ExecuteQuery($consultarCategorias) or die ("Error al traer categorias");
        echo "<td><select name='categoria'>
        <option>Selecciona una categoria</option> 
        ";
        while($colCategorias=$resCategorias->fetch_array())
        {
            echo "<option value='".$colCategorias['nombrecategoria']."'>".$colCategorias['nombrecategoria']."</option> ";         
        }  
        echo "
      </select>
    </td>";
    }
    public function MostrarRamas()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
        $consultarRamas="SELECT * FROM ramas";
        $resRamas=$conexion->ExecuteQuery($consultarRamas) or die ("Error al traer ramas");
        echo "
        <td nowrap='nowrap' align='right'><span class='texto'>Rama</span>:</td>
        <td><select name='rama'>
        <option >Seleccione una rama</option>";
        while($colRamas=$resRamas->fetch_array())
        {
            echo "    <option value=".$colRamas['nombrerama'].">".$colRamas['nombrerama']."</option>";
        }
        echo "
          </select>
         </td>";
    }
    public function InsertarEquipos($nombre,$categoria,$rama,$entrenador,$tel,$cel,$mail,$conexion)
    {
        $conexion->ConexionBD(); 
        $insertarEquipo="INSERT INTO equipos(idequipo, nombreequipo, categoria, rama, entrenador, telefono, celular, correo) 
        VALUES (null,'$nombre','$categoria','$rama','$entrenador','$tel','$cel','$mail')";
        $resinsertarEquipo=$conexion->ExecuteQuery($insertarEquipo) or die ("Error al insertar equipos");
    }
}


?>