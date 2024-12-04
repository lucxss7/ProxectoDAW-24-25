<?php
session_start();

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
    <link rel="stylesheet" href="assets/css/footer.css">
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/notificaciones.js" defer></script>
</head>

<body>

    <?php
    $tipoUsuario = $_SESSION['tipoUsuario'];
    if ($tipoUsuario == 2) {
        include("./partials/header_taller.php");
    } else {
        include("./partials/header_usuario.php");
    }
    ?>
    <h2> Calendario</h2>
    <article class="container">
        <div id="calendar2" class="item"></div>
    </article>
    <br>
</body>

</html>