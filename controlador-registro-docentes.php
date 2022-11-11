<?php
  $servidor="localhost";
  $usuario="root";
  $clave="";
  $db="marti";

  $conectar = mysqli_connect($servidor, $usuario, $clave, $db);

if(!$conectar){
  echo"ERROR AL CONECTAR A LA BDD";
}
  $nombres = $_POST['nombres'];
  $sexo = $_POST['sexo'];
  $telefono = $_POST['telefono'];
  $grado = $_POST['grado'];
  $seccion = $_POST['seccion'];
  $turno = $_POST['turno'];
  


  $insertarDatos = "INSERT INTO docentes (nombres, sexo, telefono, grado, seccion, turno)
   VALUES ('$nombres', '$sexo', '$telefono', '$grado', '$seccion', '$turno')";

  $ejecutarInsercion = mysqli_query($conectar, $insertarDatos);

if($ejecutarInsercion){
  session_start();
  $_SESSION['msj']="Registro Exitoso!";
  header("Location: registro-docente.php");
  
}
?>
