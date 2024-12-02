<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    //header('Location: https://google.es');
    ?><script>history.back()</script><?php

} else {
    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
    $usuario = $_SESSION['usuario'];
    $getLogin = "SELECT id_usuario FROM usuarios WHERE nombre = '$usuario'";

    $loginResult = $conexion->query($getLogin);
    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        $idUsuario = $loginRow['id_usuario'];
        $getCoches = "SELECT * FROM vehiculos WHERE id_usuario = $idUsuario";
        $coches = $conexion->query($getCoches);
    } else {
        echo "Usuario no encontrado.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/header.js" defer ></script>
    <script src="assets/js/plus.js" defer></script>

</head>
<body>
    <?php include("./partials/header_usuario.php") ?>
     <h2>Mis coches</h2>
    <?php 
     $coches = $conexion->query($getCoches);
    if ($coches->num_rows > 0) { 
        echo '<div class="coches-container">';
         while ($row = $coches->fetch_assoc()) { 
            echo '<div class="coche">'; 
            echo '<h2>'. $row['modelo'] . '</h2>'; echo '<p>Año: ' . $row['año'] . '</p>'; echo '<p>Matricula: ' . $row['matricula'] . '</p>';echo '<p>Kilometros: ' . $row['kilometros'] . 'kms</p>'; echo '</div>'; 
        } echo '</div>';
    ?>
    <?php
      include("./partials/footer.php");?>
</body>
</html>

<?php 
}
} 
?>
