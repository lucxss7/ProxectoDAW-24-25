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

        $queryCitas =  "SELECT * FROM citas JOIN vehiculos on citas.id_vehiculo = vehiculos.id_vehiculo JOIN usuarios ON vehiculos.id_usuario = usuarios.id_usuario WHERE usuarios.id_usuario = '$idUsuario';";

        $resultadoCitas =  $conexion->query($queryCitas);
        $citas = [];

        while ($row = $resultadoCitas->fetch_assoc()) {
            $citas[] = [
                'title' => $row['id_vehiculo'] . 'Taller:' . $row['id_taller'] . $row['descripcion'],
                'start' => $row['fecha'] . 'T' . $row['hora_inicio'],
                'end' =>  $row['fecha'] . 'T' . $row['hora_fin'],
                'id' =>  $row['id_cita'],
            ];
        }
    }
    echo json_encode($citas);
} else {
    $getTaller = "SELECT id_taller FROM usuarios WHERE nombre = '$usuario'";
    $loginResult = $conexion->query($getTaller);

    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idTaller = $loginRow['id_taller'];

        $queryCitas =  "SELECT * FROM citas JOIN vehiculos on citas.id_vehiculo =vehiculos.id_vehiculo WHERE citas.id_taller = '$idTaller'";

        $resultadoCitas =  $conexion->query($queryCitas);
        $citas = [];
        while ($row = $resultadoCitas->fetch_assoc()) {
            $hora_inicio = $row['hora_inicio']; 

            //https://es.stackoverflow.com/questions/515092/como-sumar-horas-y-minutos-en-php
            $hora = new DateTime($hora_inicio);
            $hora->add(new DateInterval('PT1H30M')); 
            $hora_final = $hora->format('H:i:s'); 
            
            $citas[] = [
                'title' => $row['id_vehiculo'] . $row['descripcion'],
                'start' => $row['fecha'] . 'T' . $row['hora_inicio'],
                'end' =>  $row['fecha'] . 'T' . $hora_final,
                'id' =>  $row['id_cita'],
            ];
        }
    }
    echo json_encode($citas);
}
