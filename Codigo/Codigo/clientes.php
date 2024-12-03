<?php
session_start();

$conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
$usuario = $_SESSION['usuario'];

if (isset($usuario)) {
    $getLogin = "SELECT tipoUsuario FROM usuarios WHERE arroba = '$usuario'";
    $loginResult = $conexion->query($getLogin);

    if ($loginResult->num_rows > 0) {
        $loginRow = $loginResult->fetch_assoc();
        if ($loginRow['tipoUsuario'] != 2) {
            //header('Location: https://google.es');
            echo "Tu no tienes que estar aquí, lambebicho";
            echo "<a href='cerrarsesion.php'>Cerrar Sesion</a>";
        } else {
            $getLogin = "SELECT id_taller FROM usuarios WHERE arroba = '$usuario'";
            $loginResult = $conexion->query($getLogin);
            if ($loginResult->num_rows > 0) {
                $loginRow1 = $loginResult->fetch_assoc();
                //var_dump($loginRow1);
                //var_dump($loginRow1['id_taller']);
                $queryClientes = "
                        SELECT usuarios.nombre, usuarios.correo, usuarios.telefono, usuarios.id_usuario
                        FROM usuarios
                        JOIN taller ON usuarios.id_taller = taller.id_taller
                        WHERE taller.id_taller = '$loginRow1[id_taller]' AND usuarios.tipoUsuario = 1
                    ";

?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link rel="stylesheet" href="./assets/css/styles.css">
                    <link rel="stylesheet" href="./assets/css/header.css" />
                    <link rel="stylesheet" href="assets/css/footer.css">
                    <script src="assets/js/header.js"></script>
                </head>

                <body>
                    <?php include("./partials/header_taller.php") ?>
                    <h2>Clientes</h2>
                    <section class="clients">
                    <?php
                
                    $queryResult = $conexion->query($queryClientes);
                    if ($queryResult->num_rows > 0) {
                        while ($cliente = $queryResult->fetch_assoc()) {
                            echo '<article class="blue" >Nombre: ' . $cliente['nombre'] . '<br>';
                            echo 'Correo e: ' . $cliente['correo'] . '<br>';
                            echo 'Teléfono: ' . $cliente['telefono'] . '<br>';
                            $idUsuario = $cliente['id_usuario'];
                            $getCoches = "SELECT * FROM vehiculos WHERE id_usuario = $idUsuario";
                            $coches = $conexion->query($getCoches);
                            echo 'Coches: <br><h4>';
                            if ($coches->num_rows > 0) {
                                while ($row = $coches->fetch_assoc()) {
                                    echo '' . $row['modelo'] . '    ';
                           
                                }
                                echo ' </h4></article>';
                            }
                        }
                    } else {
                        echo 'No se encontraron clientes.';
                    }
                    ?>
                    </section>
                    <?php include("./partials/footer.php") ?>
                </body>

                </html>
<?php
            } else {
                echo "Usuario no encontrado.";
            }
        }
    }
}
?>