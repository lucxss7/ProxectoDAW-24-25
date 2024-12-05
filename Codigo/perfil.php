<?php
session_start();

$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

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
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <script src="./assets/js/header.js"></script>
</head>
<body>
    <?php include('./partials/header_usuario.php');?>
    <h2>Mi perfil</h2>
    <form action="">
    <?php 


if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<label for = 'nombre'>Nombre: </label> <input type='text' id='nombre' value='". $fila['nombre']."'>";
        echo "<label for = 'correo'>Correo: </label> <input type='email' id='correo' value='". $fila['correo']."'>";
        echo "<label for = 'tel'>Correo: </label> <input type='tel' id='tel' value='". $fila['telefono']."'>";
    }
} else {
    echo "No se encontraron resultados.";
}
?>
</form>
</body>
</html>

<?php 
$sql->close();
$conexion->close();?>