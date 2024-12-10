<?php
// Función para limpiar la entrada
function limpiarEntrada($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coche = isset($_POST['coche']) ? limpiarEntrada($_POST['coche']) : '';
    $dia = isset($_POST['dia']) ? limpiarEntrada($_POST['dia']) : '';
    $hora = isset($_POST['hora']) ? limpiarEntrada($_POST['hora']) : '';
    $idTaller = limpiarEntrada($_POST['taller']);
    $descripcion = isset($_POST['descripcion']) ? limpiarEntrada($_POST['descripcion']) : '';
    if (empty($coche) || empty($dia) || empty($hora) || empty($descripcion)) {
        echo "Todos los campos son obligatorios.";
        exit; 
    }
   

    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
    $flag = 0;
    $sql = "INSERT INTO citas(id_vehiculo, id_taller, fecha, hora_inicio, descripcion, visto_c, visto_t) VALUES (?,?,?,?,?,?,?)";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sisssii", $coche, $idTaller, $dia, $hora, $descripcion, $flag, $flag); 
        if ($stmt->execute()) {
            header('Location: ./usuario.php');
        } else {
            echo "Error al registrar la cita: " . $stmt->error;
        }
        $stmt->close();
        $conexion->close();
} else {
    echo "No se han recibido datos.";
}}