<?php 
require "../php/db.php";

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
   

header("Content-Type: text/html;charset=utf-8");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/ico">
    <title>Editar</title>
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Main -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="cuerpo">
    <form class="fagregar" method="POST" action="../php/editardb.php" enctype="multipart/form-data">
    <div>    
    <label for="">RFC</label><br>
    <input class="emoji" lang="es" type="VARCHAR[13]" name="rfc" required placeholder="" value="<?php echo $rfc; ?>" maxlength="13">
    <br><br>

    <label for="">NOMBRE</label><br>
    <input class="emoji" lang="es" type="VARCHAR[200]" name="nombre" required placeholder="" value="<?php echo $nombre; ?>" maxlength="200">
    <br><br>

    <label for="">EDAD</label><br>
    <input class="emoji" lang="es" type="number" name="edad" min="1" max="200" required placeholder="" value="<?php echo $edad; ?>">
    </div>
    <br><br>

    <fieldset>
    <legend>Selecciona el sexo:</legend>
    <div>
      <input type="radio" name="sexo" value="M" required <?php if($sexo=='M'){echo "checked";} ?>>
      <label class="sex" for="M">Masculino</label>
    </div>
    <div>
      <input type="radio" name="sexo" value="F" required <?php if($sexo=='F'){echo "checked";} ?>>
      <label class="sex" for="F">Femenino</label>
    </div>
    </fieldset>
    <br><br>
    <div>
    <label for="">ESPECIALIDAD</label><br>
    <select class="emoji" name="especialidad" required>
    <option lang="es" value="Programación" <?php if($especialidad=='Programación'){echo "selected";} ?>>Programación</option>
    <option lang="es" value="Diseño gráfico digital" <?php if($especialidad=='Diseño gráfico digital'){echo "selected";} ?>>Diseño gráfico digital</option>
    <option lang="es" value="Construcción" <?php if($especialidad=='Construcción'){echo "selected";} ?>>Construcción</option>
    <option lang="es" value="Contabilidad" <?php if($especialidad=='Contabilidad'){echo "selected";} ?>>Contabilidad</option>
    <option lang="es" value="Administración de Recursos Humanos" <?php if($especialidad=='Administración de Recursos Humanos'){echo "selected";} ?>>Administración de Recursos Humanos</option>
    </select>
    <br>
    </div>
    <br>
    <h2>Actualizar foto de perfil (.jpg .jpeg) (OPCIONAL!!)</h2>
      <input type="file" name="file" accept="image/jpeg,img" ><br>
    <br><br>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="archivo" value="<?php echo $img; ?>">
    
    <a href="../index.php">
    <input class="return" type="button" value="Regresar " src="../index.php">
    </a>   
    <button class="return" type="submit">Actualizar </button>
    
    </form>
  
</body>
</html>

<?php
}
}

?>
