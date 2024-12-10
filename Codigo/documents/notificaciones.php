<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
$usuario = $_SESSION['usuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];


if ($tipoUsuario == 1) {
    $getLogin = "SELECT id_usuario FROM usuarios WHERE arroba = '$usuario'";
    $loginResult = $conexion->query($getLogin);

    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idUsuario = $loginRow['id_usuario'];

        $queryCitas =  "SELECT citas.id_taller, citas.descripcion, vehiculos.modelo, vehiculos.matricula, citas.fecha, citas.hora_inicio, citas.id_cita, taller.nombre FROM citas JOIN vehiculos on citas.id_vehiculo = vehiculos.id_vehiculo JOIN usuarios ON vehiculos.id_usuario = usuarios.id_usuario JOIN taller on citas.id_taller = taller.id_taller WHERE usuarios.id_usuario = '$idUsuario' and citas.visto_c = 0;";

        $resultadoCitas =  $conexion->query($queryCitas);
        $citas = [];
        

        while ($row = $resultadoCitas->fetch_assoc()) {
        $hora_inicio = $row['hora_inicio']; 

        $hora = new DateTime($hora_inicio);
        $hora->add(new DateInterval('PT1H30M')); 
        $hora_final = $hora->format('H:i:s');
            $citas[] = [
                'title' => $row['matricula'] .'-'. $row['nombre'] .'-'. $row['descripcion'],
                'start' => $row['fecha'] . '    ' . $row['hora_inicio'],
                 'end' =>  $row['fecha'] . 'T' . $hora_final,
                'id' =>  $row['id_cita'],
                'description'=>$row['descripcion']
            ];
        }
    }
    echo json_encode($citas);
} else {
    $getTaller = "SELECT id_taller FROM usuarios WHERE arroba = '$usuario'";
    $loginResult = $conexion->query($getTaller);

    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idTaller = $loginRow['id_taller'];

        $queryCitas =  "SELECT * FROM citas JOIN vehiculos on citas.id_vehiculo =vehiculos.id_vehiculo WHERE citas.id_taller = '$idTaller' and citas.visto_t = 0";

        $resultadoCitas =  $conexion->query($queryCitas);
        $citas = [];
        while ($row = $resultadoCitas->fetch_assoc()) {
            $hora_inicio = $row['hora_inicio']; 

            //https://es.stackoverflow.com/questions/515092/como-sumar-horas-y-minutos-en-php
            $hora = new DateTime($hora_inicio);
            $hora->add(new DateInterval('PT1H30M')); 
            $hora_final = $hora->format('H:i:s'); 
            
            $citas[] = [
                'title' => $row['matricula'].' || '.$row['modelo'].' || '. $row['descripcion'],
                'start' => $row['fecha'] . '   ' . $row['hora_inicio'],
                'end' =>  $row['fecha'] . '  ' . $hora_final,
                'id' =>  $row['id_cita'],
                'description' =>$row['descripcion']
            ];
        }
    }
    echo json_encode($citas);
}
