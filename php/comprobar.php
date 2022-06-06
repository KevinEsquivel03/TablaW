<?php 

require "./db.php";

$input = $_POST["rfc"];
$input1 = strtoupper($input);

$result = $connect->query("SELECT * FROM `ingreso` WHERE Exists(SELECT * FROM `ingreso` WHERE rfc='$input1')");
$numero = $result->num_rows; 

if ($numero != 0){
?>
  <a href="../index.php">
    <input class="return" type="button" value="Regresar " src="../index.php">
    </a>   
      
    <input class="return" type="reset" value="Vaciar " onclick="<?php $numero=0; ?>">
<button class="return" type="submit" disabled>GRABAR </button><br>

<label style="
	text-align: center;
	font-family: 'Font Awesome 5 Free'; font-weight: 900;
	width: 100%;
	color: rgb(255, 0, 0);" > RFC REPETIDO (vuelva a introducirlo!!)</label>

<?php

}else{
    if ($input == ""){
?>
     <a href="../index.php">
    <input class="return" type="button" value="Regresar " src="../index.php">
    </a>   
      
    <input class="return" type="reset" value="Vaciar " onclick="<?php $numero=0; ?>">
<button class="return" type="submit" disabled>GRABAR </button>

<?php
    }else{
    ?>
      <a href="../index.php">
    <input class="return" type="button" value="Regresar " src="../index.php">
    </a>   
      
    <input class="return" type="reset" value="Vaciar " onclick="<?php $numero=0; ?>">
<button class="return" type="submit">GRABAR </button>
    <?php
}}

?>

