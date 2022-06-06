<?php 
 require "../php/db.php";
$nombre_archivo = $_POST['archivo'];
$id = $_POST['id'];
$rfc = $_POST['rfc'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$especialidad = $_POST['especialidad'];
date_default_timezone_set("America/Mexico_City");
$DateAndTime = date('Y-d-m h:i:s',time());
echo $DateAndTime."<br>";
$rfc1 = strtoupper($rfc);

$sabersi = $_FILES['file']['error'];

if ($sabersi > 0){
    $result = $connect->query("SELECT * FROM `ingreso` WHERE Exists(SELECT * FROM `ingreso` WHERE rfc='$rfc1')");
    $numero = $result->num_rows; 
    if ($numero==0){
    $result = $connect->query("UPDATE `ingreso` SET `img`='$nombre_archivo',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE `rfc`='$id' ");}elseif($rfc == $id){
        
    $result = $connect->query("UPDATE `ingreso` SET `img`='$nombre_archivo',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE `rfc`='$id' ");
    }else{
        echo'<script>
        window.alert("El rfc esta repetido");
        window.location.href = "../index.php";
        </script>';
        echo "Hubo un error en la subida del archivo"; 
    }
if (!$result){
    echo "1";
    echo "<br> No se actualizo!!";
    echo '<input class="return" type="button" value="Regresar " src="../index.php">';
}else{
    echo'<script>
        window.alert("Se ah actualizado '.$id.' a nuevos datos");
        window.location.href = "../index.php";
        </script>';

    
    }

}elseif($nombre_archivo=='default.png'){

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
            $result = $connect->query("UPDATE `ingreso` SET `img`='$nombree',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE rfc='$id' ");}elseif($rfc == $id){

            $result = $connect->query("UPDATE `ingreso` SET `img`='$nombree',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE rfc='$id' ");
            }else{
                echo'<script>
                window.alert("El rfc esta repetido");
                window.location.href = "../index.php";
                </script>';
                echo "Hubo un error en la subida del archivo"; 
            }

            if ($result){
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                echo "el archivo se subio correctasmente";
                    
                echo'<script>
                window.alert("Se ah actualizado '.$id.' a nuevos datos");
                window.location.href = "../index.php";
                </script>';}else{
                echo "Hubo un error en la subida del archivo";
            
            }
            }
        }else{
            echo "solo se admiten archivos jpg";
        }
    }
}else{
    echo "El dopcumento no es una imagen";
}


if(!$result){
    echo "2";
    echo "<br> No se actualizo!!";
    echo '<input class="return" type="button" value="Regresar " src="../index.php">';
}




}else{
    //DELETE------------
if(file_exists("../uploads/$nombre_archivo")){

    if (unlink("../uploads/$nombre_archivo")){
    
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
                $result = $connect->query("UPDATE `ingreso` SET `img`='$nombree',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE rfc='$id' ");}elseif($rfc == $id){
                $result = $connect->query("UPDATE `ingreso` SET `img`='$nombree',`rfc`='$rfc1',`nombre`='$nombre',`edad`='$edad',`sexo`='$sexo',`especialidad`='$especialidad' WHERE rfc='$id' ");
                }else{
                    echo'<script>
                    window.alert("El rfc esta repetido");
                    window.location.href = "../index.php";
                    </script>';
                    echo "Hubo un error en la subida del archivo"; 
                }
                
                if ($result){
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                    echo "el archivo se subio correctasmente";
                        
                    echo'<script>
                    window.alert("Se ah actualizado '.$id.' a nuevos datos");
                    window.location.href = "../index.php";
                    </script>';}else{
                    echo "Hubo un error en la subida del archivo";
                
                }
                }
            }else{
                echo "solo se admiten archivos jpg";
            }
        }
    }else{
        echo "El dopcumento no es una imagen";
    }
    
    
    if(!$result){
        echo "3";
        echo "<br> No se actualizo!!";
        echo '<input class="return" type="button" value="Regresar " src="../index.php">';
    }
    
        }else{
            echo "No se elimino";
        }
    }else{
        echo "No se encontro el archivo";
    }
}


?>