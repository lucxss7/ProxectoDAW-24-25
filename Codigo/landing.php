<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/landing.css">
    <link rel="stylesheet" href="assets/css/otro.css">

</head>
<body>
    <header>
        <h2>Bienvenidos a Costastec</h2>
    </header>
    <section id="pres">
        <p>Una plataforma en la cual mejorar el rendimiento de tu taller, asi como tener también una página web propia en la que publicitaros, y tener una relación mas cercana con el cliente.</p>
    </section>

    <section id="service">
        <div class="servicios">
            <h3>Nuestros Servicios</h3>
            <div class="subs">
                <article>
                    <img src="https://www.boc-group.com/wp-content/uploads/2022/11/7.-Related-Resources.png" alt="Mejora" />
                    <h4>Optimización de la gestión de tu taller.</h4>
                </article>

                <article>
                    <img src="https://tbs-marketing.com/wp-content/uploads/2022/09/res-web-1.webp" alt="Web Personalizada" />
                    <h4>Creación de tu propia página web personalizada.</h4>
                </article>
                <article>
                    <img src="https://static-00.iconduck.com/assets.00/handshake-illustration-1894x2048-i6iov9ha.png" alt="Handshake" />
                    <h4>Mejora la experiencia del cliente</h4>
                </article>
            </div>
        </div>
    </section>

    <section id="talleres">
        <h3>Algunos de nuestros afiliados:</h3>
        <?php
        $conexion = new mysqli('localhost', 'root', '', 'gestiontaller');
        $queryTalleres = "SELECT * FROM taller";
        $talleres = $conexion->query($queryTalleres);
        echo '<article id="subs">';
        if ($talleres->num_rows > 0) {
            while ($row = $talleres->fetch_assoc()) {
                echo '<div id="item">';
                echo '<img src="https://www.portaldetuciudad.com/imagenes/1/empresas/Img-4411-1_amp.jpg" alt="Foto taller"';
                echo '<h4>'.$row['nombre'].'</h4>';
                echo '<p>Direccion:'.$row['direccion'].'</p>';
                echo '<p>Telefono de contacto:  '.$row['telefono'].'</p>';
                echo '</div>';
            }}
        echo '</article>';
        ?>
    </section>

    <a href="./login.php">Iniciar Sesion</a>
    <section id="contact">
        <h2>Contáctanos</h2>
        <form action="contact.php" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>
