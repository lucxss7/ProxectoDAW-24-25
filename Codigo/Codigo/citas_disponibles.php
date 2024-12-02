
<?php
session_start();

//Funcion que encuentra las citas disponibles del dia pasado por parametros
//devuelve un array con estas
function getCitas($fecha){
    $id_taller = 1; //Asumimos que solo hay un taller por tanto
    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

    $queryCitas = "SELECT hora_inicio FROM Citas WHERE id_taller = $id_taller and fecha = '$fecha'";
    $result = $conexion->query($queryCitas);
    $horas_ocupadas = [];
    
    while ($row = $result->fetch_assoc()) {
        $horas_ocupadas[] = $row['hora_inicio'];
    }
    $horas = ['8:00:00', '9:30:00', '11:00:00', '12:30:00', '14:00:00', '15:30:00'];
    $horas_disp = array_diff($horas, $horas_ocupadas);
    $horas_disp = array_values($horas_disp);
 return $horas_disp;
}

    $fecha = $_GET['fecha'];
    $horasDisponibles = getCitas($fecha); 
    echo json_encode($horasDisponibles); 

?> 
