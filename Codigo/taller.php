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

            echo "<a href='cerrarsesion.php'>Cerrar Sesion</a>";
        } else {


            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js"></script>
                <link rel="stylesheet" href="./assets/css/styles.css">
                <link rel="stylesheet" href="./assets/css/header.css" />
                <link rel="stylesheet" href="./assets/css/footer.css">
                <link rel="stylesheet" href="./assets/css/index.css">
                <script src="./assets/js/header.js" defer></script>
                <script src="./assets/js/notificaciones.js" defer></script>
                <link rel="stylesheet" href="./assets/css/calendars.css">
            </head>

            <body>
                <main>
                <?php include("./partials/header_taller.php") ?>
               
                <section class="first-line">
                    <article class="container">
                        <div id="calendar" class="item"></d>
                    </article>

                    <article class="container">
                        <div id="calendar2" class="item"></div>
                    </article>
                    <arcticle class="item container a" id="notis">Notificaciones</arcticle>
                    <a class="item container a" id="cliente_taller" href="./clientes.php">
                    <article>Clientes</article>
                    </a>
                </section>
                </div>
                <?php include("./partials/footer.php") ?>
                </main>
            </body>

            </html>
        <?php }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "No hay usuario en la sesión.";
} ?>