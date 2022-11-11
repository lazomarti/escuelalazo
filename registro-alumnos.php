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
  $cedula = $_POST['cedula'];
  $fecha = $_POST['fecha'];
  $sexo = $_POST['sexo'];
  $grado = $_POST['grado'];
  $seccion = $_POST['seccion'];
  $turno = $_POST['turno'];
  


  $insertarDatos = "INSERT INTO alumnos (nombres, cedula, fecha, sexo, grado, seccion, turno)
   VALUES ('$nombres','$cedula', '$fecha', '$sexo', '$grado', '$seccion', '$turno')";

  $ejecutarInsercion = mysqli_query($conectar, $insertarDatos);

if($ejecutarInsercion){
  session_start();
  $_SESSION['msj']="Registro Exitoso!";
  header("Location: registro.php");
  
}
?>
