<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    //header('Location: https://google.es');
    echo "Tu no tienes que estar aquí, lambebicho";
    echo "<a href='cerrarsesion.php'>Cerrar Sesion</a>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js"></script>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/header.css" />
        <link rel="stylesheet" href="assets/css/footer.css">
        <script src="./assets/js/notificaciones.js" defer></script>
        <script src="assets/js/header.js" defer></script>
        <link rel="stylesheet" href="./assets/css/calendars.css">
    </head>
    <body>
        <?php include("./partials/header_usuario.php") ?>
        <section class="first-line">
            <article class="container">
                <div id="calendar" class="item"></div>
            </article>

            <article class="container">
                <div id="calendar2" class="item"></div>
            </article>
            <article class="item container a" id="notis2">Notificaciones</article>
            <article class="item container a">Mi perfil</article>
        </section>
        <?php include("./partials/footer.php") ?>
    </body>
    </html>
<?php }
?>