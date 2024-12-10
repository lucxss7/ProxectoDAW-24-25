<?php
session_start();

$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

/* if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} */
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $sql = $conexion->prepare('SELECT * FROM usuarios WHERE arroba = ?');
    $sql->bind_param('s', $usuario);
    $sql->execute();
    $resultado = $sql->get_result();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/header.css">
        <link rel="stylesheet" href="../assets/css/profile.css">
        <link rel="stylesheet" href="../assets/css/index.css">
        <script src="../assets/js/header.js"></script>
    </head>

    <body>
        <?php include('../partials/header_usuario.php'); ?>
        <main>
            <h2>Mi perfil</h2>
            <p>Para actualizar alguna de tus formas de contacto, simplemente edita el formulario. La información que aparece
                a continuación es la que actualmente esta registrada.</p>
            <section id="cen">
                <form action="./mod_user.php" method="POST">
                    <?php
                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<input type='hidden' name='id' value='" . $fila['id_usuario'] . "'>";
                            echo "<label for = 'nombre'> Nombre:</label> <input type='text' id='nombre' name='nombre' value='" . $fila['nombre'] . "'>";
                            echo "<label for = 'correo'>Correo electrónico</label> <input type='email' id='correo' name='correo' value='" . $fila['correo'] . "'>";
                            echo "<label for = 'tel'>Teléfono</label> <input type='tel' id='tel' name='tel' value='" . $fila['telefono'] . "'>";
                        }
                    } else {
                        echo "No se encontraron resultados.";
                    }
                    ?>
                    <button type="submit">MODIFICAR</button>
                </form>
            </section>
        </main>
    </body>
    </html>

    <?php
    $sql->close();
    $conexion->close();
} else {
    header('Location: ./login.php');
}
?>