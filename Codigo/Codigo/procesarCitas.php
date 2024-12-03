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
    $descripcion = isset($_POST['descripcion']) ? limpiarEntrada($_POST['descripcion']) : '';
    if (empty($coche) || empty($dia) || empty($hora) || empty($descripcion)) {
        echo "Todos los campos son obligatorios.";
        exit; 
    }
    $idTaller = 1; //asignado directamente 1 porque en el sistema solo hay 1 taller

    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
    
    $sql = "INSERT INTO citas(id_vehiculo, id_taller, fecha, hora_inicio, descripcion) VALUES (?,?,?,?,?)";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sisss", $coche, $idTaller, $dia, $hora, $descripcion); 
        if ($stmt->execute()) {
            echo "Cita registrada con éxito.";
        } else {
            echo "Error al registrar la cita: " . $stmt->error;
        }
        $stmt->close();
} else {
    echo "No se han recibido datos.";
}}