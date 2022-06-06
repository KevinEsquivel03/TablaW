<?php
require "./db.php";

$input = $_POST["buscar"];

$buscardo = $connect->query("SELECT * FROM ingreso WHERE nombre LIKE LOWER('%".$input."%') OR edad LIKE LOWER ('%".$input."%') OR sexo LIKE LOWER ('%".$input."%') OR rfc LIKE LOWER ('%".$input."%') OR especialidad LIKE LOWER ('%".$input."%') OR time LIKE LOWER ('%".$input."%')"); 
$numero = $buscardo->num_rows; 


?>


<table class="ingresos">  

<thead class="sticky">
    <tr class="infer">
            <th>Profile</th>  
            <th>RFC</th>                 
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Especialidad</th>
            <th>Fecha de creación</th>
            <th colspan="2" class="agregar"><a title="Agregar" href="agregar.php"><img src="../img/agregar.png" alt="agregar"  width="40" height="40"></a></th>
    </tr>
</thead>
<tbody>
<?php 
  
     if ($buscardo) {
         //datos de bd
     while ($row=$buscardo->fetch_assoc()) {
     $img           = $row["img"];
     $rfc           = $row["rfc"];
     $nombre        = $row["nombre"];
     $edad          = $row["edad"];
     $sexo          = $row["sexo"];
     $especialidad  = $row["especialidad"];
     $time          = $row["time"];

       

     date_default_timezone_set('America/Mexico_City');
     $fecha = date("d / m / Y - h:i a", strtotime("$time"));
     if ($input != ""){
     if ($numero == 1){  
    if ($sexo == 'M'){
        $sa = "Masculino";
    }else{
        $sa = "Femenino";
    } 
    echo"<label class='datos'>haz seleccionado $rfc - $nombre del sexo $sa </label>"; }}
     ?>
     
    <tr id="xd" name="" class="datos" onclick="return //alert('haz seleccionado <?php // echo $rfc.' - '.$nombre.' del sexo '; ?><?php //if($sexo=='M'){echo 'Masculino';}else{echo 'Femenino';} ?> de esta lista');"> 
            <th class="profile"><img src="../uploads/<?php echo $img; ?>" width="50" height="50" alt="F"></th>  
            <th><?php echo $rfc; ?></th> 
            <th><?php echo $nombre; ?></th> 
            <th><?php echo $edad; ?></th> 
            <th><?php echo $sexo; ?></th> 
            <th><?php echo $especialidad; ?></th>
            <th><?php echo $fecha; ?></th>
            <th><a title="Quitar" href="../php/quitar.php? id=<?php echo $rfc; ?> " onclick="return confirm('Estas seguro que deseas quitar <?php echo $rfc.' - '.$nombre; ?> de esta lista?');" ><img src="../img/quitar.png" alt="quitar" width="30" height="30"></a> </th> 
            <th><a title="Editar" href="../vistas/editar.php? id=<?php echo $rfc; ?> "><img src="../img/editar.png" alt="editar" width="30" height="30"> </a></th> 
          </tr> 
          
          <?php
         }
     }
        ?>
</tbody>
</table>  