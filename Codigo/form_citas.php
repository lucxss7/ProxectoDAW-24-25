<?php session_start();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reservas</title>
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/css/form2.css">

    <script src="./assets/js/header.js" defer ></script>  
    <script src="./assets/js/form.js" defer></script>
</head>


<body>
        <?php include("./partials/header_usuario.php") ?>
        <h2>Pide tu siguiente cita: </h2>
    <section id='main-container'>
    <article class="form-container">          
    <form action="./procesarCitas.php" method="POST">
        <label for="coche">Coche:</label>
        <select id="coche" name="coche">
            <!-- Aqui iran los coches -->
        </select>
        <br><br>

        <label for="taller">Taller:</label>
        <select name="taller" id="taller">
                    <!-- Aqui iran los talleres -->
                <?php
                foreach ($talleresArray as $taller) {
                    echo "<option value='{$taller['id_taller']}'>{$taller['nombre']}</option>";
                }
            ?></select>
                    <br><br>

        <label for="dia">Día:</label>
        <input type="date" id="dia" name="dia">
        <br><br>

        <label for="hora">Hora:</label>
        <select id="hora" name="hora">
            <!-- Aqui iran las citas -->
        </select>
        <br><br>

        <label for="descripcion">Descripción:</label>
        <aside id="descripcionError"></aside>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea>
        <br><br>

        <input type="submit" value="Enviar">
    </form>
    </article>
    
    <!-- Sección para otros talleres -->
    <article id="otrostalleres">
        <h3>Otros Talleres</h3>
        <p>
            Recuerda que puedes pedir citas en otros talleres si te urge el arreglo y en el tuyo de confianza no hay hueco. Mira nuestros talleres afiliados aquí debajo:
        </p>
        <aside class="image-container">
            <figure>
            <img src="./assets/img/taller.webp" alt="Foto taller 1">
                <figcaption>Taller A</figcaption>
            </figure>
            <figure>
                <img src="./assets/img/taller2.jpg" alt="Foto taller 2">
                <figcaption>Tallerez leza</figcaption>
            </figure>
        </aside>
    </article>
    </section>
</body>
</html>