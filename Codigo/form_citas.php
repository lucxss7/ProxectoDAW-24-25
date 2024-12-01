<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reservas</title>
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="./assets/js/header.js" defer ></script>  
    <script src="./assets/js/form.js" defer></script>
</head>
<body>
    <form action="" method="POST">
        <label for="coche">Coche:</label>
        <select id="coche" name="coche">
            <!-- Aqui iran los coches -->
        </select>
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
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea>
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>