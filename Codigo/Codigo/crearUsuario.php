<?php
        $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $correo = htmlspecialchars(trim($_POST['correo']));
        $telefono = htmlspecialchars(trim($_POST['telefono']));
        $contraseña = htmlspecialchars(trim($_POST['contraseña']));
        $contraseña2 = htmlspecialchars(trim($_POST['contraseña2']));
        $taller = $_POST['taller'];
        $tipoUsuario = 1;
        if($contraseña2 == $contraseña){
        $sql = 'INSERT INTO usuarios(nombre, correo, telefono, id_taller, passwd, tipoUsuario) VALUES (?,?,?,?,?,?)';
        $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

        if($stmt = $conexion->prepare($sql)){
            $stmt->bind_param("ssiisi", $nombre, $correo, $telefono, $taller, $contraseña, $tipoUsuario);
            if($stmt->execute()){
                header('Location: ./login.php');
            }else{
                echo "Error al registrar usuario: " . $stmt->error;
            }
            $stmt->close();
        }
    }else{
        header('Location: form_registro.php?error=1');
    }}
    $conexion->close();
?>
