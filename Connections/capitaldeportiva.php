<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
class Conneciones{

    public $hostname_capitaldeportiva;
    public $database_capitaldeportiva;
    public $username_capitaldeportiva;
    public $password_capitaldeportiva;

    public function __construct()
    {
    $this->hostname_capitaldeportiva = "localhost";
    $this->database_capitaldeportiva = "capitaldeportiva";
    $this->username_capitaldeportiva = "root";
    $this->password_capitaldeportiva = "";
    }
public function ConexionBD()
{
 

$this->conexion = new mysqli($this->hostname_capitaldeportiva, $this->username_capitaldeportiva, $this->password_capitaldeportiva,$this->database_capitaldeportiva ) or die ("No se ha podido conectar al servidor de Base de datos");
if($this->conexion->connect_errno)
{
    die("Error al conectarse a la bd");
}

}

public function Cerrarbd()
{
    $this->conexion->close();

}

public function ExecuteQuery($sql)
{
    $result=$this->conexion->query($sql);
    return $result;
}
#configuracion servidor local



#configuracion para el servidor
#$hostname_capitaldeportiva = "mysql.hostinger.mx";
#$database_capitaldeportiva = "u238855497_cosmo";
#$username_capitaldeportiva = "u238855497_cosmo";
#$password_capitaldeportiva = "prodrdel76";  

//mysql_pconnect va a causar un error en el intento de conexion ya que esa funcion quedo obsoleta con las nuevas versiones de php
//$capitaldeportiva = mysql_pconnect($hostname_capitaldeportiva, $username_capitaldeportiva, $password_capitaldeportiva) or trigger_error(mysql_error(),E_USER_ERROR); 

//conexion que si sirve

}
?>