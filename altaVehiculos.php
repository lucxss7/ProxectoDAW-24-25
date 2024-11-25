<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y asignar variables
    $modelo = htmlspecialchars(trim($_POST['modelo']));
    $kms = htmlspecialchars(trim($_POST['kms']));
    $año = htmlspecialchars(trim($_POST['año']));
    $itv_check = isset($_POST['itv_check']) ? 1 : 0; // Convertir checkbox a 1 o 0

    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    
    $usuario = $_SESSION['usuario'];

    $getLogin = "SELECT id_usuario FROM usuarios WHERE nombre = '$usuario'";

    $loginResult = $conexion->query($getLogin);
    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idUsuario = $loginRow['id_usuario'];


    // Insertar datos en la base de datos
 $sql = "INSERT INTO vehiculos (id_usuario, modelo, kms, año, itv_check) VALUES ('$idUsuario','$modelo', '$kms', '$año', '$itv_check')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo vehículo registrado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
    // Cerrar conexión
    $conexion->close();
}