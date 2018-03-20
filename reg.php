<?php
//Conexion con la base de datos y el servidor
$link = mysqli_connect("localhost","root","", "usuarios") or die("<h2>No se encuentra el servidor</h2>");
//$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");
//$db = mysqli_select_db("usuarios",$link) or die("<h2>Error del servidor</h2>");

session_start();
error_reporting(0);

//Obtenemos los valores del formulario
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

//Obtener la longitud de un string
$req = (strlen($nombre)*strlen($usuario)*strlen($correo)*strlen($pass)*strlen($rpass)) or die("No se han llenado todos los campos");

//se confirma la contraseña
if($pass != $rpass){
  die('Las contrase&ntilde;as no coinciden <br><br> <a href="index.html" >Volver</a>');
}

//Se encripta la contraseña
$pass = md5($pass);

//Consulta para insertar
$insertar = "INSERT INTO datos (nombre_completo,usuario,correo,password) VALUES ('$nombre','$usuario','$correo','$pass')";

//Evitar registros Duplicados
$verificar_usuario = mysqli_query($link, "SELECT * FROM datos WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
  echo '
    <script>
      alert("El usuario ya esta registrado");
      window.history.go(-1);
    </script>
  ';
  die();
}
$verificar_correo = mysqli_query($link, "SELECT * FROM datos WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0){
  echo '
    <script>
      alert("El correo ya esta registrado");
      window.history.go(-1);
    </script>
  ';
  die();
}

//Ejecutar consulta
$resultado = mysqli_query($link, $insertar);
//mysqli_query($link, "INSERT INTO datos VALUES ('','$nombre','$usuario','$correo','$pass')") or die("<h2>Error de envio</h2>");
//mysqli_query("INSERT INTO datos VALUES ('','$nombre','$usuario','$correo','$pass')",$link) or die("<h2>Error de envio</h2>");
if (!$resultado){
   echo "
   <h2>Error de envio</h2>
   ";
}
else {
  echo "
  <h2>Registro Completado</h2>
  <h5>Gracias por registrarse en nuestra web, ya puede ingresar como usuario</h5>
  <a href='login2.php' >Iniciar Sesion</a>
  ";
}

//Cerrar Conexion
mysqli_close($link);
 ?>
