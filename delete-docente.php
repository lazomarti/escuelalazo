<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="js/sweetAlert/sweetalert2.min.css">
    <script src="js/sweetAlert/sweetalert2.all.min.js"></script>
</head>
<body>  
</body>
</html>

<?php
$servidor="localhost";
  $usuario="root";
  $clave="";
  $db="marti";
$link = mysqli_connect($servidor, $usuario, $clave, $db);
if(!$link){
  echo"ERROR AL CONECTAR A LA BDD";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];  
      $borrar = "DELETE FROM docentes WHERE id= $id";
      $ejecutarBorrar = mysqli_query($link, $borrar);
      if(!$ejecutarBorrar){
          die("Query_Failed");
      }
      if($ejecutarBorrar){
        session_start();
        $_SESSION['delete']="Eliminar Exitoso!";
        header("Location: consulta-docente.php");
      }
    }
      ?>
