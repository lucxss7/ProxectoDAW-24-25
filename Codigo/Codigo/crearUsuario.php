<?php
$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $arroba = htmlspecialchars(trim($_POST['arroba']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $contraseña = htmlspecialchars(trim($_POST['contraseña']));
    $contraseña2 = htmlspecialchars(trim($_POST['contraseña2']));
    $taller = intval($_POST['taller']); // Asegúrate de que sea un número
    $tipoUsuario = 1;

    if ($contraseña === $contraseña2) {
        $hashedPswd = password_hash($contraseña, PASSWORD_BCRYPT);
        $sqlArrobas = 'SELECT arroba FROM usuarios WHERE arroba = ?';
        if ($stmtCheck = $conexion->prepare($sqlArrobas)) {
            $stmtCheck->bind_param("s", $arroba);
            $stmtCheck->execute();
            $stmtCheck->store_result();
            if ($stmtCheck->num_rows > 0) {
                header('Location: form_registro.php?error=2');
                $stmtCheck->close();
                $conexion->close();
                exit;
            }
            $stmtCheck->close();
        }
        $sqlInsert = 'INSERT INTO usuarios (nombre, correo, telefono, id_taller, passwd, tipoUsuario, arroba) VALUES (?, ?, ?, ?, ?, ?, ?)';
        if ($stmtInsert = $conexion->prepare($sqlInsert)) {
            $stmtInsert->bind_param("sssisis", $nombre, $correo, $telefono, $taller, $hashedPswd, $tipoUsuario, $arroba);
            if ($stmtInsert->execute()) {
                header('Location: ./login.php');
                exit;
            } else {
                echo 'Ocurrió un error al guardar los datos.';
            }
            $stmtInsert->close();
        }
    } else {
        header('Location: form_registro.php?error=1');
        exit;
    }
}
$conexion->close();
?>
