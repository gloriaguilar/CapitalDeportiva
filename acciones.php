<?php
require("Controllers/controllerArbitro.php");
require("Controllers/controllerEquipo.php");
require("Controllers/controllerProvedor.php");
require_once("Connections/capitaldeportiva.php");
$conexion=new Conneciones();

if(isset($_FILES["fleImagen"]["name"]))
{
    $foto=$_FILES["fleImagen"]["name"];
    $ruta=$_FILES["fleImagen"]["tmp_name"];
    $destino="fotos/".$foto."";
}
if(isset($_POST['InsertarRegistro']))
{
    $variable=$_POST['InsertarRegistro'];    
}else{
    $variable=null;
    echo "No llego la variable";
}


switch ($variable) {
    case 'insertarArbitros':
    copy($ruta,$destino);
    controllerArbitro::InsertarArbitros($_POST['nombrearbitro'],$_POST['telefono'],$_POST['celular'],$destino,$conexion);
        break; 
    case 'listararbitros':
    header('Location:vistas/listararbitros.php');
        break;
    case 'listarequipos':
        header('Location:vistas/listarequipos.php');
            break;
    case 'listarempleados':
        header('Location:vistas/listarempleados.php');
            break;
    case 'listarproveedores':
        header('Location:vistas/listarproveedores.php');
            break;
    case 'InsertarRegistro':
        controllerArbitro::InsertarArbitros($_POST['nombrearbitro'],$_POST['telefono'],$_POST['celular'],$destino,$conexion);
        header('Location:../capitaldeportiva/vistas/listararbitros.php');
            break;
    case 'eliminarArbitros':
        controllerArbitro::EliminarArbitro($_POST['idArbitro'],$conexion);
            break;
    case 'ModificarArbitro':
        controllerArbitro::recolectarArbitro($_POST['idArbitro'],$conexion);
                break;
    case 'enviarArbitro':
        controllerArbitro::actualizaArbitro($_POST['idPersona'],$_POST['nombre'],$_POST['telefono'],$_POST['celular'],$destino,$conexion);
        header('Location:../capitaldeportiva/vistas/listararbitros.php');
                break;
    case 'modificarequipos':
        ControllerEquipo::recolectaEquipo($_POST['idEquipo']);
                break;
    case 'enviarEquipo':
        ControllerEquipo::ActualizarEquipo($_POST['idEquipo'],$_POST['nombreequipo'],$_POST['categoria'],$_POST['rama'],$_POST['entrenador'],$_POST['telefono'],$_POST['celular'],$_POST['correo'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarequipos.php');
                break;
    case 'borrarequipos':
        ControllerEquipo::BorrarEquipos($_POST['idEquipo'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarequipos.php');
                break;
    case 'insertarEquipo': 
        ControllerEquipo::InsertarEquipos($_POST['nombreequipo'],$_POST['categoria'],$_POST['rama'],$_POST['entrenador'],$_POST['telefono'],$_POST['celular'],$_POST['correo'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarequipos.php');
                break;
    case 'modificarempleados':
        ControllerEmpleado::TraerEmpleado($_POST['idEmpleado'],$conexion);
                break;
    case 'enviarEmpleado':
        copy($ruta,$destino);
        ControllerEmpleado::ActualizarEmpleado($_POST['idEmpleado'],$destino,$_POST['nombrEmpleadp'],$_POST['puestoEmpleado'],$_POST['telEmpleado'],$_POST['celEmpleado'],$_POST['mailEmpleado'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarempleados.php');
        break;
    case 'borrarempleados':
        ControllerEmpleado::EliminarEmpleado($_POST['idEmpleado'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarempleados.php');
        break;
    case 'insertarEmpleado':
        copy($ruta,$destino);
        ControllerEmpleado::InsertarEmpleado($destino,$_POST['nombreempleado'],$_POST['puesto'],$_POST['telefono'],$_POST['celular'],$_POST['correo'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarempleados.php');
        break;
    case 'borrarProvedor':
        ControllerProvedor::EliminarProvedor($_POST['idEquipo'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarproveedores.php');
        break;
    case 'modificarProvedor':
        ControllerProvedor::RecolectaProvedor($_POST['idEquipo'],$conexion);
        break;
    case 'actualizrProvedor':
        ControllerProvedor::ActualizarProvedor($_POST['idproveedor'],$_POST['nombreproveedor'],$_POST['direccion'],$_POST['estado'],$_POST['rfc'],$_POST['contacto'],$_POST['correo'],$_POST['paginaweb'],$conexion);             
        header('Location:../capitaldeportiva/vistas/listarproveedores.php');                                                    
        break;
        case 'InsertarProveedor':
        ControllerProvedor::AgregarProveedor($_POST['nombreproveedor'],$_POST['estado'],$_POST['direccion'],$_POST['rfc'],$_POST['contacto'],$_POST['correo'],$_POST['paginaweb'],$conexion);
        header('Location:../capitaldeportiva/vistas/listarproveedores.php');
        break;
}

?>