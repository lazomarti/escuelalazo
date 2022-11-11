<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Escuela Basica </title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css"/>
<link rel="stylesheet" href="js/sweetAlert/sweetalert2.min.css">
<script src="js/sweetAlert/sweetalert2.all.min.js"></script>

<!-- Font Google -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="fondo--marti">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container"> <a class="navbar-brand navbar-logo " href="index.html"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"> <a class="nav-link" href="registro-docente.php">Registro</a> </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar --> 

<!-- Banner Image -->

<div class="banner text-center" data-scroll-index='0'>
  <div class="banner-overlay">
    <div class="container">
      <h1 class="text-capitalize">REPORTE</h1>
</div>
  </div>
</div>






<a href="consulta-docente.php" class="botons2">LISTA COMPLETA</a>  





<form class="form-register" action="consulta-filtro-docente.php" method="post">
<?php
$servidor="localhost";
$usuario="root";
$clave="";
$db="marti";
$link = mysqli_connect($servidor, $usuario, $clave, $db);
if(!$link){
echo"ERROR AL CONECTAR A LA BDD";
}

session_start();
if(isset($_SESSION['msj'])){ 
  $respuesta = $_SESSION['msj']; ?>
<script>

Swal.fire(
  'Registro exitoso!',
  'el usuario se agrego a la lista!',
  'success'
);
</script>
<?php
unset($_SESSION['msj']);
}

if(isset($_POST['b-nombre'])){
  $sql = "SELECT * FROM docentes WHERE nombres = '".$_POST['b-nombre']."'";
$ejecuta_sentencia = mysqli_query($link, $sql);
}
 ?>

<h4>Busqueda por nombre</h4>
  <input class="controls" type="text" name="b-nombre" id="correo" placeholder="Ingrese el nombre" required>
  <input class="botons" type="submit" value="Buscar">
 </form>

 <form class="form-register" action="consulta-filtro-docente.php" method="post">
  <h4>Filtrar</h4>
  <h4>Grado</h4>
                    <select name="f-grado" id="f-grado" required>
                        <option value="">Seleccione el grado</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <h4>Seccion</h4>
                    <select name="f-seccion" id="f-seccion" required>
                        <option value="">Seleccione la seccion</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                    <h4>turno</h4>
                    <select name="turno" id="turno" >
                        <option value="">Seleccione el Turno</option>
                        <option value="">Mañana</option>
                        <option value="">Tarde</option>
                    </select>
    <input class="botons" type="submit" value="Filtrar">
</form>
       
       
<?php

if(isset($_POST['f-grado']) and isset($_POST['f-seccion'])){
  $f_grado = $_POST['f-grado'];
  $f_seccion = $_POST['f-seccion'];
  $order_grado_seccion = "SELECT * FROM docentes WHERE grado = '$f_grado' AND seccion = '$f_seccion'";
  $ejecuta_order_grado_seccion = mysqli_query($link, $order_grado_seccion);

?>
<table class="tabla" >
  <tbody>    
            <tr>
             <td class="tabla-titulos">Nombre</td>
             <td class="tabla-titulos">Sexo</td>
             <td class="tabla-titulos">grado</td>
             <td class="tabla-titulos">seccion</td>
             <td class="tabla-titulos">turno</td>
             <td class="tabla-titulos">Acciones</td> 
            </tr>
            <?php
                 while($row = mysqli_fetch_array( $ejecuta_order_grado_seccion)){ ?>
                 
                    <tr>
                         <td>
                          <?php echo$row['nombres'];?>
                         </td>                        
                        <td>
                           <?php echo$row['sexo']; ?>
                        </td>
                        <td>
                            <?php echo$row['grado']; ?>
                        </td>
                        <td>
                            <?php echo$row['seccion']; ?>
                        </td>
                        <td>
                            <?php echo$row['turno']; ?>
                        </td>
                        <td>
                            <a href= "edit.php?id=<?php echo$row['id'];?>"> <img src="images/lapiz.svg" class="icon-form"></a>
                            <a href="delete.php?id=<?php echo$row['id'];?>" class="btn-del"> <img src="images/borrador.svg" class="icon-form formulario-eliminar"></a>
                        </td>
                    </tr>                      
                    <?php
                  }
              ?> 
        </tbody>
    </table>

<?php
}

else{
  if(isset($_POST['b-nombre'])){
?>

<table class="tabla" >
  <tbody>    
            <tr>
             <td class="tabla-titulos">Nombre</td> 
             <td class="tabla-titulos">Sexo</td>
             <td class="tabla-titulos">Telefono</td>
             <td class="tabla-titulos">grado</td>
             <td class="tabla-titulos">seccion</td>
             <td class="tabla-titulos">turno</td>
             <td class="tabla-titulos">Acciones</td> 
            </tr>
            <?php
                 while($row = mysqli_fetch_array($ejecuta_sentencia)){ ?>
                 
                    <tr>
                         <td>
                          <?php echo$row['nombres'];?>
                         </td>                        
                        <td>
                           <?php echo$row['sexo']; ?>
                        </td>
                        <td>
                           <?php echo$row['telefono']; ?>
                        </td>
                        <td>
                            <?php echo$row['grado']; ?>
                        </td>
                        <td>
                            <?php echo$row['seccion']; ?>
                        </td>
                        <td>
                            <?php echo$row['turno']; ?>
                        </td>
                        <td>
                            <a href= "edit-docente.php?id=<?php echo$row['id'];?>"> <img src="images/lapiz.svg" class="icon-form"></a>
                            <a href="delete-docente.php?id=<?php echo$row['id'];?>" class="btn-del"> <img src="images/borrador.svg" class="icon-form formulario-eliminar"></a>
                        </td>
                    </tr>                      
                    <?php
                  }
              ?> 
        </tbody>
    </table>

<?php}?>





<?php
}
  if(isset($_POST['f-grado'])){
    $order_grado = "SELECT * FROM docentes WHERE grado = '$f_grado'";
    $ejecuta_order_grado = mysqli_query($link, $order_grado);

?>
<table class="tabla" >
  <tbody>    
            <tr>
             <td class="tabla-titulos">Nombre</td> 
             <td class="tabla-titulos">Sexo</td>
             <td class="tabla-titulos">grado</td>
             <td class="tabla-titulos">seccion</td>
             <td class="tabla-titulos">turno</td>
             <td class="tabla-titulos">Acciones</td> 
            </tr>
            <?php
                 while($row = mysqli_fetch_array($ejecuta_order_grado)){ 
                  ?>
                 
                    <tr>
                         <td>
                          <?php echo$row['nombres'];?>
                         </td>                        
                        <td>
                           <?php echo$row['sexo']; ?>
                        </td>
                        <td>
                            <?php echo$row['grado']; ?>
                        </td>
                        <td>
                            <?php echo$row['seccion']; ?>
                        </td>
                        <td>
                            <?php echo$row['turno']; ?>
                        </td>
                        <td>
                            <a href= "edit.php?id=<?php echo$row['id'];?>"> <img src="images/lapiz.svg" class="icon-form"></a>
                            <a href="delete.php?id=<?php echo$row['id'];?>" class="btn-del"> <img src="images/borrador.svg" class="icon-form formulario-eliminar"></a>
                        </td>
                    </tr>                      
                    <?php
                  }
              ?> 
        </tbody>
    </table>

<?php
}
if(isset($_POST['f-seccion'])){
  $order_seccion = "SELECT * FROM docentes WHERE seccion = '$f_seccion'";
  $ejecuta_order_seccion = mysqli_query($link, $order_seccion);
?>
<table class="tabla" >
  <tbody>    
            <tr>
             <td class="tabla-titulos">Nombre</td>  
             <td class="tabla-titulos">Sexo</td>
             <td class="tabla-titulos">grado</td>
             <td class="tabla-titulos">seccion</td>
             <td class="tabla-titulos">turno</td>
             <td class="tabla-titulos">Acciones</td> 
            </tr>
            <?php
                 while($row = mysqli_fetch_array($ejecuta_order_seccion)){ ?>
                 
                    <tr>
                         <td>
                          <?php echo$row['nombres'];?>
                         </td>                        
                        <td>
                           <?php echo$row['sexo']; ?>
                        </td>
                        <td>
                            <?php echo$row['grado']; ?>
                        </td>
                        <td>
                            <?php echo$row['seccion']; ?>
                        </td>
                        <td>
                            <?php echo$row['turno']; ?>
                        </td>
                        <td>
                            <a href= "edit.php?id=<?php echo$row['id'];?>"> <img src="images/lapiz.svg" class="icon-form"></a>
                            <a href="delete.php?id=<?php echo$row['id'];?>" class="btn-del"> <img src="images/borrador.svg" class="icon-form formulario-eliminar"></a>
                        </td>
                    </tr>                      
                    <?php
                  }
              ?> 
        </tbody>
    </table>

<?php
}
}
?>







<style>
  .tabla{
    display: flex;
    justify-content:center;
    align-items:center;
    border-collapse:collapse !important;
    margin-top: 100px;
    color:black;
}

 .tabla tbody tr td, .tabla tr th{
padding: 5px !important;
margin: 0px !important;
border: 1px solid black !important;

 }

 .tabla tbody tr:nth-child(odd) {
    background-color: rgb(158, 155, 155) !important;

 }
  .botons2{
    display: flex;
    align-items:center;
    justify-content:center;
  width: 15%;
	background: #1f53c5;
	border: none;
	padding: 12px;
	color: white;
	margin: 16px 0;
	font-size: 16px;
  text-align: center;
    }
 
    .tabla tbody {
    background-color: #fff;
 }
</style>
    
         
                
                

                  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
<!-- owl carousel js --> 
<script src="js/owl.carousel.min.js"></script> 
<!-- magnific-popup --> 
<script src="js/jquery.fancybox.min.js"></script> 

<!-- scrollIt js --> 
<script src="js/scrollIt.min.js"></script> 

<!-- isotope.pkgd.min js --> 
<script src="js/isotope.pkgd.min.js"></script> 
<script>
  $(window).on("scroll",function () {

      var bodyScroll = $(window).scrollTop(),
          navbar = $(".navbar");

      if(bodyScroll > 130){

          navbar.addClass("nav-scroll");
          $('.navbar-logo img').attr('src','images/logo-black.png');


      }else{

          navbar.removeClass("nav-scroll");
          $('.navbar-logo img').attr('src','images/logo-white.png');

      }

  });

  $(window).on("load",function (){



var bodyScroll = $(window).scrollTop(),
navbar = $(".navbar");

if(bodyScroll > 130){

navbar.addClass("nav-scroll");
$('.navbar-logo img').attr('src','images/logo-black.png');


}else{

navbar.removeClass("nav-scroll");
$('.navbar-logo img').attr('src','images/logo-white.png');

}

/* smooth scroll
  -------------------------------------------------------*/
  $.scrollIt({

easing: 'swing',      // the easing function for animation
scrollTime: 900,       // how long (in ms) the animation takes
activeClass: 'active', // class given to the active nav element
onPageChange: null,    // function(pageIndex) that is called when page is changed
topOffset: -63
});

/* isotope
-------------------------------------------------------*/
var $gallery = $('.gallery').isotope({});
$('.gallery').isotope({

    // options
    itemSelector: '.item-img',
    transitionDuration: '0.5s',

});


$(".gallery .single-image").fancybox({
  'transitionIn'  : 'elastic',
  'transitionOut' : 'elastic',
  'speedIn'   : 600,
  'speedOut'    : 200,
  'overlayShow' : false
});


/* filter items on button click
-------------------------------------------------------*/
$('.filtering').on( 'click', 'button', function() {

    var filterValue = $(this).attr('data-filter');

    $gallery.isotope({ filter: filterValue });

    });

$('.filtering').on( 'click', 'button', function() {

    $(this).addClass('active').siblings().removeClass('active');

});

})

$(function () {
$( ".cover-bg" ).each(function() {
    var attr = $(this).attr('data-image-src');

    if (typeof attr !== typeof undefined && attr !== false) {
      $(this).css('background-image', 'url('+attr+')');
    }

  });

  /* sections background color from data background
  -------------------------------------------------------*/
  $("[data-background-color]").each(function() {
      $(this).css("background-color", $(this).attr("data-background-color")  );
  });


/* Owl Caroursel testimonial
  -------------------------------------------------------*/
  
  $('.testimonials .owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    items:1,
    margin:30,
    dots: true,
    nav: false,
    
  });

});

</script>
</body>
</html>