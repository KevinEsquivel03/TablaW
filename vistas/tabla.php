<?php
require "../php/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/ico">
    <title>Tabla</title>
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- importante -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- CSS Main -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="cuerpo">

    <table class="inicio">
        <thead class="sticky"> 
       <tr class="md"><th colspan="7">Mantenimiento de datos (<?php $result=$connect->query('SELECT * FROM `ingreso` '); echo $result->num_rows; ?> registros en total)</th></tr> 
        <tr><th colspan="7"><input type="text" class="buscar" name="buscar" id="buscar" placeholder="Buscar" onkeyup="buscar_ahora($('#buscar').val());" autocomplete="off"></th></tr>
    </thead>
    </table>       

    <div id="datos_buscador"></div>    
    <script>
    $(document).ready(function(){
    $('.buscar').keyup().one;
    buscar_ahora($('#buscar').val());
    });
    </script>   

    <script type="text/javascript">
        function buscar_ahora(buscar) {
        var parametros = {"buscar":buscar};
        $.ajax({
        data:parametros,
        type: 'POST',
        url: "../php/buscador.php",
        success: function(data) {
        document.getElementById("datos_buscador").innerHTML = data;
        }
        });
        }
    // buscar_ahora();
    </script>
    
</body>
<footer class="pie">
    <h6>Creado por: Kevin Alexander Esquivel Hernandez</h6>
    <br>
    <h6>Estudiante del CBTIS214 Ignacio Allendeeee</h6>
</footer>
</html>
<?php echo "";  ?>