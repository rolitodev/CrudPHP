<?php 

// servidor
$dbname = "id18819381_inmobiliaria";
$dbuser = "id18819381_root";
$dbhost = "localhost";
$dbpass = "uFtQMv->yWIs45*G";

// pruebas
// $dbname = "inmobiliaria";
// $dbuser = "root";
// $dbhost = "localhost";
// $dbpass = "";

$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conexion) {
    die("[INFO]: No se pudo conectar a la base de datos (". mysqli_connect_error().")");
}

?>