<?php
// Función para limpiar la entrada
function limpiarEntrada($dato) {
    $dato = trim($dato);
    $dato = ($dato);
    $dato = ($dato);
    return $dato;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? stripslashes(htmlspecialchars($_POST['nombre'])) : '';
    $telefono = isset($_POST['tel']) ? limpiarEntrada($_POST['tel']) : '';
    $correo = isset($_POST['correo']) ? limpiarEntrada($_POST['correo']) : '';
    $id = limpiarEntrada($_POST['id']);

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
} else {
    echo "No se han recibido datos.";
}}