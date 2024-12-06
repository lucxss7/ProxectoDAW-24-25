<?php
session_start();
$tipoUsuario = $_SESSION['tipoUsuario'];

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => "$errstr in $errfile on line $errline"]);
    exit;
});

if($tipoUsuario == 1){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['id'])) {
        $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

        if ($conexion->connect_error) {
            echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']);
            exit;
        }

        $id = $input['id'];

        $query = 'DELETE FROM citas WHERE id_cita = ?';
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
}}
?>