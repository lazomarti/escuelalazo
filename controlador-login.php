<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$servidor="localhost";
$usuario="root";
$clave="";
$db="marti";

$conectar = mysqli_connect($servidor, $usuario, $clave, $db);

if(!$conectar){
echo"ERROR AL CONECTAR A LA BDD";
}

$consulta = "SELECT * FROM usuario WHERE usuario='$usuario' and clave='$clave'";
$resultado = mysqli_query($conectar, $consulta);

$filas = mysqli_num_rows($resultado);

if($filas = true) {
    header("Location:menu.php");
}

else{
    echo "ERROR";
}

mysqli_free_result($resultado);
mysqli_close($conectar);


?>