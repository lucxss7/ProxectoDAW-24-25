<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Vehículo</title>
    <link rel="stylesheet" href="./assets/css/styles.css"> 
    <link rel="stylesheet" href="./assets/css/header.css" /> 
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/form.css">
</head>
<body>

    <?php include('./partials/header_usuario.php')?>
    <main class="container">

        <section class="form-container">
            <h2>Formulario de Vehículo</h2>
            <form action="./altaVehiculos.php" method="post">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" placeholder="Ej. Toyota Corolla" required>
                
                <label for="kms">Kilómetros:</label>
                <input type="number" id="kms" name="kms" placeholder="Ej. 150000" required>
                
                <label for="año">Año:</label>
                <input type="number" id="año" name="año" placeholder="Ej. 2022" required>
                
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" placeholder="Ej. 2452DCN" required>
                
                <input type="submit" value="Enviar">
            </form>
        </section>

        <aside class="image-container">
            <figure>
                <img src="./assets/img/coches1.webp" alt="Coche moderno y elegante">
            </figure>
            <figure>
                <img src="./assets/img/coches2.webp" alt="Coche deportivo">
            </figure>
            <figure>
                <img src="./assets/img/coches3.jpg" alt="Coche clásico">
            </figure>
            <figure>
                <img src="./assets/img/coches4.jpg" alt="Coche familiar">
            </figure>
            <figure>
                <img src="./assets/img/tractor.jpg" alt="Coche familiar">
            </figure>
            <figure>
                <img src="./assets/img/camion.jpg" alt="Coche familiar">
            </figure>
 
        </aside>
    </main>
</body>
</html>
