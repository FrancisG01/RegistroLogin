<?php
session_start();
error_reporting(0);
//$_SESSION['usuario'] = $usuario;
$login = $_SESSION['Login'];
/*$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
  //echo 'Usted no tiene autorizacion';
  header("location:autorizacion.html");
  die();
}*/
if($login>0){
  header("location:bienvenido.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <div class="contenedor">
      <div class="formulario">
        <h1>Iniciar Sesion</h1>
        <br><br>
        <form class="formulario-r" action="login.php" method="POST">

          <br><br>
          <label>Usuario: </label>
          <input type="text" name="usuario" placeholder="Nombre de Usuario">

          <br><br>
          <label>Contraseña: </label>
          <input type="password" name="password" placeholder="Contraseña">

          <br><br>
          <input type="submit" name="enviar" value="Iniciar Sesion">
        </form>
      </div>
    </div>
  </body>
</html>
