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
        <script src="assets/js/header.js" defer></script>
        <style>
            /* Contenedor para los calendarios */
            .first-line {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
                width: 100%;
                padding: 10px;
            }

            .container {
                width: 48%;
                margin: 0 auto;
            }

            #calendar,
            #calendar2 {
                width: 100%;
                margin: 10px 0;
            }

            .a {
                height: 200px;
                background-color: #f4f6f9;
            }


            @media (max-width: 1048px) {
                .first-line {
                    flex-direction: column;
                }

                .container {
                    width: 100%;
                    margin: 0 auto;
                }
            }
        </style>
    </head>

    <body>
        <?php include("./partials/header_usuario.php") ?>

        <div class="first-line">
            <div class="container">
                <div id="calendar" class="item"></div>
            </div>

            <div class="container">
                <div id="calendar2" class="item"></div>
            </div>
            <div class="item container a">Notificaciones</div>
            <div class="item container a">Mi perfil</div>
        </div>
       


        <script>
            $(document).ready(function () {
                        $('#calendar').fullCalendar({
                            header: false,
                            locale: 'es',
                            buttonText: {
                                today: 'Hoy',
                                month: 'Mes',
                                week: 'Semana',
                                day: 'Día',
                                list: 'Lista de citas'
                            },
                            defaultView: 'agendaDay',
                            allDaySlot: false,
                            minTime: "08:00:00",
                            maxTime: "17:00:00",
                            slotLabelInterval: "01:00",
                            events: function (start, end, timezone, callback) {
                                $.ajax({
                                    url: './citas.php',
                                    dataType: 'json',
                                    success: function (data) {
                                        var eventos = [];
                                        $(data).each(function () {
                                            eventos.push({
                                                title: this.title,
                                                start: this.start,
                                                end: this.end,
                                                description: this.description,
                                                id: this.id
                                            });
                                        });
                                        callback(eventos);
                                    },
                                    error: function (xhr, status, error) {
                                        console.log("Error al cargar las citas:", error);
                                    }
                                });
                            },
                           eventAfterAllRender: function () {

                                $('.fc-today').css('background-color', '#f4f6f9');
                           }
                        });
                    });

            $(document).ready(function () {
                $('#calendar2').fullCalendar({
                    header: false,
                    locale: 'es',
                    buttonText: {
                        today: 'Hoy',
                        month: 'Mes',
                        week: 'Semana',
                        day: 'Día',
                        list: 'Lista de citas'
                    },
                    events: function (start, end, timezone, callback) {


                        // Realizar la solicitud AJAX para obtener las citas
                        $.ajax({
                            url: './citas.php',
                            dataType: 'json',
                            success: function (data) {
                                var eventos = [];
                                $(data).each(function () {
                                    eventos.push({
                                        title: this.title,
                                        start: this.start,
                                        end: this.end,
                                        description: this.description,
                                        id: this.id
                                    });
                                });
                                callback(eventos);
                            },
                            error: function (xhr, status, error) {
                                console.log("Error al cargar las citas:", error);
                            }
                        });
                    }
                })
            })
        </script>
        <?php include("./partials/footer.php") ?>
    </body>

    </html>
<?php }
?>