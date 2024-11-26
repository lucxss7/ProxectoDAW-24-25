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
<script src="./assets/js/plantilla.js"></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/header.css" />
    <link rel="stylesheet" href="assets/css/footer.css">
    <script src="assets/js/header.js"></script>
</head>
<body>

<?php 
$tipoUsuario = $_SESSION['tipoUsuario'];
if($tipoUsuario == 2){
    include("./partials/header_taller.php");
}else{
    include("./partials/header_usuario.php");
}
 
?>

  <h2> Calendario</h2>
  <div class="container">
   <div id="calendar"></div>
  </div>
  <br>
</body>
</html>

<script>

$(document).ready(function(){
    $('#calendar').fullCalendar({
        header:{
            left:'month, agendaWeek, agendaDay, list',
            center:'title',
            right: 'today, prev, next'
        },
        locale: 'es',
        buttonText:
        {
            today:'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Lista de citas'
        },
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: './citas.php', 
                dataType: 'json', 
                success: function(data) {
                    var eventos = [];
                    $(data).each(function() {
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
                error: function(xhr, status, error) {
                    console.log("Error al cargar las citas:", error);
                }
            });
    }}
)})

    </script>