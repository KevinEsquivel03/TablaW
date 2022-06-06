<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/ico">
    <title>Agregar</title>
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Main -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- importante -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body class="cuerpo">
    <form class="fagregar" method="POST" action="../php/agregardb.php" enctype="multipart/form-data">
    <div>    
    <label for="rfc">RFC</label><br>
    
    <input lang="es" type="text" name="rfc" required placeholder="" maxlength="13" id="rfc" class="emoji" onkeyup="comprobar_rfc($('#rfc').val());" >
    <br><br>

    <label for="">NOMBRE</label><br>
    <input class="emoji" lang="es" type="VARCHAR[200]" name="nombre" required placeholder="" maxlength="200">
    <br><br>

    <label for="">EDAD</label><br>
    <input class="emoji" lang="es" type="number" name="edad" min="1" max="200" required placeholder="">
    </div>
    <br><br>

    <fieldset>
    <legend>Selecciona el sexo:</legend>
    <div>
      <input type="radio" name="sexo" value="M" required>
      <label class="sex" for="M">Masculino</label>
    </div>
    <div>
      <input type="radio" name="sexo" value="F" required>
      <label class="sex" for="F">Femenino</label>
    </div>
    </fieldset>
    <br><br>
    <div>
    <label for="">ESPECIALIDAD</label><br>
    <select class="emoji" name="especialidad" required>
    <option lang="es" value="" disabled selected hidden>Seleccionar </option>
    <option lang="es" value="Programación">Programación</option>
    <option lang="es" value="Diseño gráfico digital">Diseño gráfico digital</option>
    <option lang="es" value="Construcción">Construcción</option>
    <option lang="es" value="Contabilidad">Contabilidad</option>
    <option lang="es" value="Administración de Recursos Humanos">Administración de Recursos Humanos</option>
    </select>
    <br>
    </div>
    <br>
    <h2>Subir foto de perfil (.jpg .jpeg) (OPCIONAL!!)</h2>
      <input type="file" name="file" accept="image/jpeg,img" ><br>
    <br><br>
    
    
  
    <div id="comprobacion" class="comprobacion" ></div>
    
    <?php 

//require "agregardb.php";

?>
    </form>
    <script>
    $(document).ready(function(){
    $('.rfc').keyup().one;
    comprobar_rfc($('#rfc').val());
    });
    </script>  
    <script type="text/javascript">
        function comprobar_rfc(rfc) {
        var parametros = {"rfc":rfc};
        $.ajax({
        data:parametros,
        type: 'POST',
        url: "../php/comprobar.php",
        success: function(data) {
        document.getElementById("comprobacion").innerHTML = data;
        }
        });
        }
    </script>
</body>
</html>