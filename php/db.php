<?php
$host = "localhost";
$usuario = "root";
$password = "Nomolestar1";
$db = "cbtis";

$connect = new mysqli($host,$usuario,$password,$db);  

$connect->set_charset("utf8");

if ($connect -> connect_error){
    die("coneccion fallida: ".$connect->connect_error);
}
//echo 'Conexion exitosa';

?>