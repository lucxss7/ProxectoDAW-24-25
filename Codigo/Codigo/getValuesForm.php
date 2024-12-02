<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
$usuario = $_SESSION['usuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];


if ($tipoUsuario == 1) {
    $getLogin = "SELECT id_usuario FROM usuarios WHERE nombre = '$usuario'";
    $loginResult = $conexion->query($getLogin);

    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idUsuario = $loginRow['id_usuario'];

        $getCoches = "SELECT * FROM vehiculos WHERE id_usuario = $idUsuario";
        $resultadoCoches =  $conexion->query($getCoches);
        $coches = [];

        while ($row = $resultadoCoches->fetch_assoc()) {
            $coches[] = ['id_vehiculo' => $row['id_vehiculo'], 'modelo' => $row['modelo']];
        }
    }
    $data = array('coches_usuario'=>$coches);
    echo json_encode($data);
} else {
}
