<?php 

require "db.php";
header("Content-Type: text/html;charset=utf-8");
$rfc = $_POST['rfc'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$especialidad = $_POST['especialidad'];

$rfc1 = strtoupper($rfc);

$sabersi = $_FILES['file']['error'];

if ($sabersi > 0){
    $result = $connect->query("SELECT * FROM `ingreso` WHERE Exists(SELECT * FROM `ingreso` WHERE rfc='$rfc1')");
    $numero = $result->num_rows; 
    if ($numero==0){
    $result = $connect->query("INSERT INTO ingreso(img,rfc,nombre,edad,sexo,especialidad) VALUES ('default.png','$rfc1','$nombre','$edad','$sexo','$especialidad')");}else{
        echo "el archivo no se subio correctasmente";
            
        echo'<script>
        var opcion = confirm("el rfc esta repetido ¿desea volver a intentarlo?");
        if (opcion == true) {
        window.location.href = "../vistas/agregar.php";
        } else {
        window.location.href = "../index.php";
        }
        </script>
        ';
    }
    if ($result){
        echo "el archivo se subio correctasmente";
            
        echo'<script>
        var opcion = confirm("Se ah grabado correctamente ¿desea ingresar otra informacion?");
        if (opcion == true) {
        window.location.href = "../vistas/agregar.php";
        } else {
        window.location.href = "../index.php";
        }
        </script>
        ';
    }else{
        echo'<script>
    var opcion = confirm("no se ah ejecutado correctamente ¿desea volver a intentarlo?");
    if (opcion == true) {
     window.location.href = "../vistas/agregar.php;
    } else {
     window.location.href = "../index.php";
    }
    </script>
    ';
    }

}else {


//UPLOAD------------
 
 //var_dump($_FILES["file"]);
 $parent = dirname(__DIR__);
 $directorio = $parent."\\uploads\\";

$archivo = $directorio . basename($_FILES["file"]["name"]);

$tipodearchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

$archivo = $directorio . basename($rfc1.".".$tipodearchivo);

$nombree = $rfc1.".".$tipodearchivo;

//valida que es imagen
$checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

//var_dump($size);

if($checarSiImagen != false){
    //validando el tamaño del archivo
    $size= $_FILES["file"]["size"];

    if ($size > 10485760){
        echo "El archivo tiene que ser menor a 10mb";
    }else{
        //validando el tipo de imagen 
        if ($tipodearchivo == "jpg" || $tipodearchivo == "jpeg"){
            // se valido el archivo 
            $result = $connect->query("SELECT * FROM `ingreso` WHERE Exists(SELECT * FROM `ingreso` WHERE rfc='$rfc1')");
            $numero = $result->num_rows; 
            if ($numero==0){
                $result = $connect->query("INSERT INTO ingreso(img,rfc,nombre,edad,sexo,especialidad) VALUES ('$nombree','$rfc1','$nombre','$edad','$sexo','$especialidad')");}else{
                echo "el archivo no se subio correctasmente";

                echo'<script>
                var opcion = confirm("el rfc esta repetido ¿desea volver a intentarlo?");
                if (opcion == true) {
                window.location.href = "../vistas/agregar.php";
                } else {
                window.location.href = "../index.php";
                }
                </script>
                ';
            }
            
            if ($result){
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                echo "el archivo se subio correctasmente";
                    
                echo'<script>
                var opcion = confirm("Se ah grabado correctamente ¿desea ingresar otra informacion?");
                if (opcion == true) {
                window.location.href = "../vistas/agregar.php";
                } else {
                window.location.href = "../index.php";
                }
                </script>
                ';
                die();}

            }else{
                echo "Hubo un error en la subida del archivo";
            }
        }else{
            echo "solo se admiten archivos jpg";
        }
    }
}else{
    echo "El dopcumento no es una imagen";
}


if(!$result){
echo'<script>
var opcion = confirm("no se ah ejecutado correctamente ¿desea volver a intentarlo?");
    if (opcion == true) {
     window.location.href = "../vistas/agregar.php;
    } else {
     window.location.href = "../index.php";
    }
 </script>
 ';
}


}
?>