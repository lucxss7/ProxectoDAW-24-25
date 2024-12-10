<?php
session_start();
if(isset($_SESSION['usuario'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? stripslashes(htmlspecialchars($_POST['nombre'])) : '';
    $telefono = isset($_POST['tel']) ? stripslashes(htmlspecialchars($_POST['tel'])) : '';
    $correo = isset($_POST['correo']) ? stripslashes(htmlspecialchars($_POST['correo'])) : '';
    $id = stripslashes(htmlspecialchars($_POST['id']));

    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
    $sql = "UPDATE usuarios set nombre = ? , correo = ?, telefono = ? where id_usuario = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ssii", $nombre, $correo, $telefono, $id); 
        if ($stmt->execute()) {
            header('Location: ./perfil.php');
        } else {
            echo "Error al modificar el usuario: " . $stmt->error;
        }
        $stmt->close();
        $conexion->close();
} else {
    echo "No se han recibido datos.";
    $conexion->close();
}}}else{
    header('Location:./login.php');
}
