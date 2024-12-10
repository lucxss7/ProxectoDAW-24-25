<?php
$queryTallers = 'SELECT nombre, id_taller FROM taller';
$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$talleres = $conexion->query($queryTallers);
$talleresArray = array();

if ($talleres->num_rows > 0) {
    while ($row = $talleres->fetch_assoc()) {
        $talleresArray[] = array('nombre' => $row['nombre'], 'id_taller' => $row['id_taller']);
    }
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Taller</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css" />
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/formregis.css">

    <script src="../assets/js/header.js"></script>
    <script src="../assets/js/validationForms.js" defer></script>
</head>

<body>
    <h2>Formulario de registro</h2>

    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        switch ($error) {
            case 1:
                echo '<div style="color: red;text-align:center;font-weight:bold;"><p>Las contraseñas no coinciden. Por favor, inténtalo de nuevo.</p></div>';
                break;
            default:
                echo '<div style="color: red;text-align:center;font-weight:bold; "><p>Nombre de usuario ya en uso. Por favor, ingrese otro.</p></div>';
                break;
        }
    }
    ?>
    <main class='container'>
        <form action="./crearUsuario.php" method="post" id="userForm">
            <label for="nombre">Nombre:</label>
            <div class="error" id="nombreError"></div>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="arroba">Usuario:</label>
            <div class="error" id="arrobaError"></div>
            <input type="text" id="arroba" name="arroba" required><br><br>

            <label for="correo">Correo:</label>
            <div class="error" id="correoError"></div>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="telefono">Teléfono:</label>
            <div class="error" id="telefonoError"></div>
            <input type="tel" id="telefono" name="telefono" required><br><br>

            <label for="contraseña">Contraseña:</label>
            <div class="error" id="contraseñaError"></div>
            <input type="password" id="contraseña" name="contraseña" required><br><br>

            <label for="contraseña2">Repite la contraseña por favor:</label>
            <div class="error" id="contraseña2Error"></div>
            <input type="password" id="contraseña2" name="contraseña2" required><br><br>

            <label for="taller">Taller:</label>
            <div class="error" id="tallerError"></div>
            <select id="taller" name="taller" required>
                <?php
                foreach ($talleresArray as $taller) {
                    echo "<option value='{$taller['id_taller']}'>{$taller['nombre']}</option>";
                }
                ?>
            </select><br><br>
            <input type="submit" value="Enviar">
        </form>
    </main>

</body>

</html>