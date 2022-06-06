<?php
require "./db.php";

$input = $_GET["buscar"];
$input1 = strtolower($input);
if ($input1 == "femenino" || $input1 == "mujer" || $input1 == "mujeres"){
    $input = "F";
    $buscardo = $connect->query("SELECT * FROM ingreso WHERE sexo LIKE LOWER ('%".$input."%')");
    
}elseif ($input1 == "masculino" || $input1 == "hombre" || $input1 == "hombres"){
    $input = "M";
    $buscardo = $connect->query("SELECT * FROM ingreso WHERE sexo LIKE LOWER ('%".$input."%')");
}else{

$buscardo = $connect->query("SELECT * FROM ingreso WHERE nombre LIKE LOWER('%".$input."%') OR edad LIKE LOWER ('%".$input."%') OR sexo LIKE LOWER ('%".$input."%') OR rfc LIKE LOWER ('%".$input."%') OR especialidad LIKE LOWER ('%".$input."%') OR time LIKE LOWER ('%".$input."%')");
}

//$buscardo = $connect->query("SELECT * FROM ingreso WHERE nombre LIKE LOWER('%".$input."%') OR edad LIKE LOWER ('%".$input."%') OR sexo LIKE LOWER ('%".$input."%') OR rfc LIKE LOWER ('%".$input."%') OR especialidad LIKE LOWER ('%".$input."%') OR time LIKE LOWER ('%".$input."%')"); 
$numero = $buscardo->num_rows; 


?>
<div>Mantenimiento de datos <?php echo $numero; ?> registros</div>