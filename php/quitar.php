<?php 
require "db.php";
header("Content-Type: text/html;charset=utf-8");
$id = $_GET['id'];

$datos = $connect->query("SELECT * FROM `ingreso` WHERE rfc='$id' ");
//$row = $datos->num_rows;
if ($datos) {
while ($row = $datos->fetch_assoc()) {
    $img = $row["img"]; 
    $rfc = $row["rfc"];
    $nombre = $row["nombre"];
    $edad = $row["edad"];
    $sexo = $row["sexo"];
    $especialidad = $row["especialidad"]; 

    if ($img == 'default.png') {
        $result = $connect->query("DELETE FROM `ingreso` WHERE rfc='$id'");
        if ($result){
            echo "se elimino!!";
            header("Location: ../index.php");
        }else{
            echo "No se elimino!!";
            echo '<input class="return" type="button" value="Regresar " src="../index.php">';
        }
    }else{
        //DELETE------------
    if(file_exists("../uploads/$img")){

    if (unlink("../uploads/$img")){
        $result = $connect->query("DELETE FROM `ingreso` WHERE rfc='$id'");
        if ($result){
            echo "se elimino!!";
            header("Location: ../index.php");
        }else{
            echo "No se elimino!!";
            echo '<input class="return" type="button" value="Regresar " src="../index.php">';
        }
    }else{
        echo "No se elimino la imagen!!";
        echo '<input class="return" type="button" value="Regresar " src="../index.php">';
    }
}else{
    echo "No se encontro la imagen!!";
    echo '<input class="return" type="button" value="Regresar " src="../index.php">';
}
}
   
}}else{echo "No se elimino!!";
    echo '<input class="return" type="button" value="Regresar " src="../index.php">';}



?>