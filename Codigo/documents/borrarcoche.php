<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

        if ($conexion->connect_error) {
            echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']);
            exit;
        }

        $id = $input['id'];

        $query = 'DELETE FROM vehiculos WHERE id_vehiculo = ?';
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se pudo eliminar el coche.']);
        }
        $stmt->close();
        $conexion->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'ID no proporcionado.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Solicitud inválida.']);
}
?>
