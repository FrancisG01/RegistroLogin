<?php
session_start();
error_reporting(0);
$login = $_SESSION['Login'];

/*$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
  //echo 'Usted no tiene autorizacion';
  header("location:autorizacion.html");
  die();
}*/

if($login>0){

}
else{
  header("location:nologin.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
  </head>
  <body>
    <h1>Bienvenido: <?php echo $_SESSION['usuario'] ?></h1>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
  </body>
</html>
