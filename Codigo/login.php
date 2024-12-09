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
  $login = htmlspecialchars(trim($_POST["usuario"])); // Sanitizar entrada
  $pass_input = trim($_POST["pass"]); // Contraseña introducida

  $query = "SELECT passwd, tipoUsuario FROM usuarios WHERE arroba = ?";
  if ($stmt = $conexion->prepare($query)) {
      $stmt->bind_param("s", $login);
      $stmt->execute();
      $stmt->store_result();
      if ($stmt->num_rows > 0) {
          $stmt->bind_result($hashedPassword, $tipoUsuario);
          $stmt->fetch();
          if (password_verify($pass_input, $hashedPassword)) {
              $hayUser = true;
              $_SESSION['usuario'] = $login;
              $_SESSION['tipoUsuario'] = $tipoUsuario;
              if ($tipoUsuario == 1) {
                  header("Location: ./usuario.php");
              } elseif ($tipoUsuario == 2) {
                  header("Location: ./taller.php");
              }
              exit;
          }
      }
      $stmt->close();
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
    <section class="login">
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
          </div>
        </form>
    </section>
  </main>
</body>

</html>