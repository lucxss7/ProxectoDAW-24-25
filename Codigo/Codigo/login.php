<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
/*    if ($conexion->connect_errno) {
      die("Falló la conexión: %s\n" . $conexion->connect_error);
    } else {
      echo "La conexión se ha realizado correctamente.<br>";
    }  */

$hayDatos = isset($_POST["usuario"]);
$hayUser = false;

if ($hayDatos) {
  $login = $_POST["usuario"];
  $pass_input = $_POST["pass"];
  $queryPass = "SELECT passwd FROM usuarios WHERE nombre = '$login'";
  $queryUser = "SELECT nombre FROM usuarios WHERE nombre ='$login' and tipoUsuario ='1'";
  $comprobacionUsuario = $conexion->query($queryUser);

  if ($comprobacionUsuario->num_rows > 0 && $queryPass = $pass_input) {

    //echo "Usuario encontrado";
    $hayUser = true;
    $_SESSION['usuario'] = $login;
    $_SESSION['tipoUsuario'] = 1;
    header("Location: ./usuario.php");
  } else {

    $queryAdmin = "SELECT nombre FROM usuarios WHERE nombre ='$login' 
              AND passwd = '$pass_input' and tipoUsuario='2'";
    $checkAdmin = $conexion->query($queryAdmin);
    if ($checkAdmin->num_rows == 1) {
      $hayUser = true;
      $_SESSION['usuario'] = $login;
      $_SESSION['tipoUsuario'] = 2;
      header("Location: ./taller.php");
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicia sesión en Talleres Leza</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
  <main>
    <section>
      <article class="login">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="login__form">
            <h1>Inicia sesión</h1>
            <?php
            if ($hayDatos && !$hayUser) {
            ?>
              <p style="color:red; font-size:0.9rem;margin-bottom:1rem;">Usuario o contraseña incorrectos</p>
            <?php
            }
            ?>
            <p>
              <label for="usuario">Usuario</label>
              <input type="text" name="usuario" id="usuario" />
            </p>
            <p>
              <label for="pass">Contraseña</label>
              <input type="password" name="pass" id="pass" />
            </p>
            <input type="submit" name="submit" id="submit" value="Iniciar sesión" />
        </form>
        </div>
      </article>
    </section>
  </main>
</body>

</html>