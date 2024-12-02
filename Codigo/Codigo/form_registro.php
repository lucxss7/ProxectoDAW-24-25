<?php
    $queryTallers = 'SELECT nombre, id_taller FROM taller';
    $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
    $talleres = $conexion->query($queryTallers);
    $talleresArray = array();
    if ($talleres->num_rows > 0) {
        while ($row = $talleres->fetch_assoc()) {
            $talleresArray[] = array('nombre' => $row['nombre'], 'id_taller' => $row['id_taller']);
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Taller</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/header.css" />
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <script src="./assets/js/header.js"></script>
</head>
<body>
    <h2>Formulario de Taller</h2>
     <!-- Mostrar error si las contraseñas no coinciden -->
     <?php if (isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <div style="color: red;">
            <p>Las contraseñas no coinciden. Por favor, inténtalo de nuevo.</p>
        </div>
        <?php }?>
    <form action="crearUsuario.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="contraseña2">Repite la contraseña por favor:</label><br>
        <input type="password" id="contraseña2" name="contraseña2" required><br><br>
        <label for="taller">Taller:</label><br>
        <select id="taller" name="taller" required>
            <?php
                foreach ($talleresArray as $taller) {
                    echo "<option value='{$taller['id_taller']}'>{$taller['nombre']}</option>";
                }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
