<?php
session_start();
error_reporting(0);
$login = $_SESSION['Login'];
if($login>0){
  header("location:bienvenido.php");
  die();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error</title>
  </head>
  <body>
    <h2>Aun no ha iniciado sesión</h2>
    <a href="login2.php">Iniciar Sesión</a>
  </body>
</html>
