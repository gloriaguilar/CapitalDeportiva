<?php

Class controllerArbitro
{

    public function InsertarArbitros($nombreArbitro,$telefono,$celular,$foto,$conexion)
    {
    
        $conexion->ConexionBD();
        $InsertarArbitros="INSERT INTO arbitros (idarbitro,imagen,nombrearbitro,telefono,celular) VALUES 
        (null,'$foto','$nombreArbitro','$telefono','$celular')";
        $resInArbitros=$conexion->ExecuteQuery($InsertarArbitros) or die ("No se pudo insertar arbitros");
        print_r($InsertarArbitros);
    }
    public function MostrarArbitros()
    {
        require_once("../Connections/capitaldeportiva.php");
        $conexion=new Conneciones();
        $conexion->ConexionBD();
    
        $consultarArbitros="Select * from arbitros ORDER BY nombrearbitro ASC";
        $resArbitros=$conexion->ExecuteQuery($consultarArbitros) or die ("No se pudo traer arbitros");
        $contador=0;
        
        while($columnaArbitos=$resArbitros->fetch_array())
        {
            echo "
            <form action='../acciones.php' method='POST'>
            <tr bgcolor='#FFFFF' class='texto'>
                <td><img src='../".$columnaArbitos['imagen']."' width='100' height='100' /></td>
                <td>".$columnaArbitos['nombrearbitro']."</td>
                <td>".$columnaArbitos['telefono']."</td>
                <td>".$columnaArbitos['celular']."</td>
                <input type='hidden' value='".$columnaArbitos['idarbitro']."' name='idArbitro'>
                <td><div align='center'><button type='submit' name='InsertarRegistro' value='ModificarArbitro'><img src='../imagenes/modificar.png' width='15' height='15'/></button></div></td>
                <td><div align='center'><button type='submit' name='InsertarRegistro' value='eliminarArbitros'><img src='../imagenes/borrar.png' width='15px' height='15px' /></button></div></td>
            </tr>
            </form>
            ";
    
        }
    }
    public function EliminarArbitro($idArbitro,$conexion)
    {

        $conexion->ConexionBD();
    
        $eliminarArbitro="DELETE FROM arbitros WHERE idarbitro='$idArbitro'";
        $resEliminar=$conexion->ExecuteQuery($eliminarArbitro) or die ("Error al eliminar arbitro");
        header('Location:../capitaldeportiva/vistas/listararbitros.php');
    }
    
public function FormModificar($id,$Nombre,$telefono,$celular,$foto,$text)
{
    echo "
    <form action='acciones.php' enctype='multipart/form-data' method='POST'>
    <table border='0' cellpadding='2' cellspacing='0' width='715'>
       <tr>
             <td colspan='2' class='punteado'><div align='center'>Agregar árbitros al directorio</div></td>
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
             <td><input type='file' name='fleImagen' value=".$foto."/></td>
       </tr>
            <tr>
                <td align='right' nowrap='nowrap' class='texto'>Nombre de Arbitro:</td>
             <td><input type='text' name='nombre' value=".$Nombre." size='32' /></td>
             <td><input type='hidden' name='idPersona' value=".$id." size='32' /></td>
            </tr>
       <tr valign='baseline'>
             <td nowrap='nowrap' align='right'><span class='texto'>Teléfono</span>:</td>
             <td><input type='text' name='telefono' size='32' value=".$telefono." /></td>
       </tr>
       <tr valign='baseline'>
             <td nowrap='nowrap' align='right'><span class='texto'>Celular</span>:</td>
             <td><input type='text' name='celular' value=".$celular." size='32' /></td>
       </tr>
       <tr valign='baseline'>
             <td nowrap='nowrap' align='right'>&nbsp;</td>
             <td><input type='submit'  name='InsertarRegistro'  value='".$text."'/>Insertar registr</td>
       </tr>
     </table>
         <input type='hidden' name='MM_insert' value='form1' />
</form>
    ";
}
public function recolectarArbitro($idArbitro,$conexion)
{
    $modificaArbitro="enviarArbitro";
    $conexion->ConexionBD();
    $consultaArbitros="SELECT * from arbitros WHERE idarbitro='$idArbitro'";
    $resConsulta=$conexion->ExecuteQuery($consultaArbitros) or die ("No se pudo traer arbitros");
    while($colArbitro=$resConsulta->fetch_array())
    {
        $id=$colArbitro['idarbitro'];
        $nombre=$colArbitro['nombrearbitro'];
        $telefono=$colArbitro['telefono'];
        $celular=$colArbitro['celular'];
        $imagen=$colArbitro['imagen'];    
    }
    self::FormModificar($id,$nombre,$telefono,$celular,$imagen,$modificaArbitro);
    
}

public function actualizaArbitro($id,$Nombre,$tel,$cel,$foto,$conexion)
{

    $conexion->ConexionBD();
    $actualizarArbitro="UPDATE arbitros set imagen='$foto',nombrearbitro='$Nombre',
    telefono='$tel',celular='$cel' WHERE idarbitro='$id'";
    $resulArbitro=$conexion->ExecuteQuery($actualizarArbitro);

}
}





?>