<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $correo = htmlspecialchars(trim($_POST['correo']));
        $telefono = htmlspecialchars(trim($_POST['telefono']));
        $contraseña = htmlspecialchars(trim($_POST['contraseña']));
        $taller = htmlspecialchars(trim($_POST['taller']));

           
    
    }
?>
