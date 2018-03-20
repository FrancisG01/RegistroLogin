<?php
//Conexion con la base de datos y el servidor
//$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");
$link = mysqli_connect("localhost","root","", "usuarios") or die("<h2>No se encuentra el servidor</h2>");
//$db = mysqli_select_db("usuarios",$link) or die("<h2>Error del servidor</h2>");
session_start();
error_reporting(0);

//obtenemos los valores del formulario
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$pass = $_POST['password'];
$rpass = $_POST['rpassword'];


$_SESSION['usuario'] = $usuario;
$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
  //echo 'Usted no tiene autorizacion';
  header("location:autorizacion.html");
  die();
}
//header("location:login.html");

//Obtener la longitud de un string
$req = (strlen($nombre)*strlen($usuario)*strlen($correo)*strlen($pass)*strlen($rpass)) or die("No se han llenado todos los campos");

//se confirma la contraseña
if($pass != $rpass){
  die('Las contrase&ntilde;as no coinciden <br><br> <a href="index.html" >Volver</a>');
}

//Se encripta la contraseña
$pass = md5($pass);

//ingresar la informacion a la tabla datos
mysqli_query($link, "INSERT INTO datos (nombre_completo,usuario,correo,password)
VALUES ('$nombre','$usuario','$correo','$pass')") or die("<h2>Error de envio</h2>");
//mysqli_query($link, "INSERT INTO datos VALUES ('','$nombre','$usuario','$correo','$pass')") or die("<h2>Error de envio</h2>");

//mysqli_query("INSERT INTO datos VALUES ('','$nombre','$usuario','$correo','$pass')",$link) or die("<h2>Error de envio</h2>");

echo "
<h2>Registro Completado</h2>
<h5>Gracias por registrarse en nuestra web, ya puede ingresar como usuario</h5>
<a href='login2.php' >Iniciar Sesion</a>
";
mysqli_close($conexion);
 ?>
