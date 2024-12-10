<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $modelo = htmlspecialchars(trim($_POST['modelo']));
    $kms = htmlspecialchars(trim($_POST['kms']));
    $año = htmlspecialchars(trim($_POST['año']));
    $matricula = htmlspecialchars($_POST['matricula']); 

    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $usuario = $_SESSION['usuario'];
    $getLogin = "SELECT id_usuario FROM usuarios WHERE arroba = '$usuario'";
    $loginResult = $conexion->query($getLogin);
    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idUsuario = $loginRow['id_usuario'];

 $sql = "INSERT INTO vehiculos (id_usuario, modelo, kilometros, año, matricula) VALUES (?,?,?,?,?)";
 if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("isiis", $idUsuario, $modelo, $kms, $año, $matricula); 
    if ($stmt->execute()) {
        header('Location: ./coches.php');
    } else {
        echo "Error al registrar la cita: " . $stmt->error;
    }
    $stmt->close();
}}}
    $conexion->close();
