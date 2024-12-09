<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/otro.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>
    <header class="imagen-container">
        <h2>Bienvenidos a Costastec</h2>
        <p>Sabemos lo importante que es tu taller para ti. Por eso hemos creado un espacio donde profesionalismo,
            confianza e innovación se encuentran.</p> Estamos aquí para ayudarte a crecer, destacarte y conectar mejor
        con tus clientes.</p>
        <a href="./login.php" class="sticky"><button href="./login.php" class="boton">Iniciar Sesion</button></a>
    </header>


    <section id="service">
        <div class="servicios">
            <h3>Nuestros Servicios</h3>
            <div class="subs">
                <article>
                    <img src="https://www.boc-group.com/wp-content/uploads/2022/11/7.-Related-Resources.png"
                        alt="Mejora" />
                    <h4>Optimización de la gestión de tu taller.</h4>
                </article>

                <article>
                    <img src="https://tbs-marketing.com/wp-content/uploads/2022/09/res-web-1.webp"
                        alt="Web Personalizada" />
                    <h4>Creación de tu propia página web personalizada.</h4>
                </article>
                <article>
                    <img src="https://static-00.iconduck.com/assets.00/handshake-illustration-1894x2048-i6iov9ha.png"
                        alt="Handshake" />
                    <h4>Mejora la experiencia del cliente</h4>
                </article>
            </div>
        </div>
    </section>
    <section class="fras">
        <p>
            Aunque llevamos poco tiempo en el mercado, nuestra misión es clara: ayudarte a que tu taller alcance todo su
            potencial. Sabemos lo importante que es mantener a tus clientes contentos y tu carga de trabajo bajo
            control. Por eso, hemos diseñado una solución a medida para talleres como el tuyo.
            No te quedes atrás. Súmate hoy mismo a nuestra plataforma y descubre cómo podemos ayudarte a mejorar la
            eficiencia, reducir los tiempos muertos y ofrecer una experiencia inigualable a tus clientes.
            ¡Haz crecer tu taller con nosotros!
        </p>
        <img src="./assets/img/ilustracion.png" alt="" width="40%" height="auto">
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
                echo '<img src="https://www.portaldetuciudad.com/imagenes/1/empresas/Img-4411-1_amp.jpg" alt="Foto taller">';
                echo '<h4>' . $row['nombre'] . '</h4>';
                echo '<p>Direccion: ' . $row['direccion'] . '</p>';
                echo '<p>Telefono de contacto:  ' . $row['telefono'] . '</p>';
                echo '<a href="./index.html"><button class="boton">Conocelos mas</button></a>';
                echo '</div>';
            }
        }
        echo '</article>';
        ?>
    </section>
    <h3 style="margin-top:20px;">Nuestra seccion de compraventa</h3>
    <section id="compraventa">

        <article class="car-article">
            <img src="https://mobility.caetanoretail.es/wp-content/uploads/2023/10/208-2.png" alt="Ford Puma 2023"
                class="car-image">
            <h4>Peugeot 208 5P Allure BlueHDi</h4>
            <div class="car-details">
                <p class="price">Precio: 21,995 €</p>
                <p class="mileage">Kilometraje: 6,500 km</p>

            </div>
        </article>
        <article class="car-article">
            <img src="https://mobility.caetanoretail.es/wp-content/uploads/2023/08/picanto.png" alt="Ford Puma 2023"
                class="car-image">
            <h4>KIA PICANTO 1.0 DPI CONCEPT</h4>
            <div class="car-details">
                <p class="price">Precio: 21,995 €</p>
                <p class="mileage">Kilometraje: 6,500 km</p>

            </div>
        </article>
        <article class="car-article">
            <img src="https://mobility.caetanoretail.es/wp-content/uploads/2023/11/sportage_1.png" alt="Ford Puma 2023"
                class="car-image">
            <h4>Kia Sportage 1.6 CRDi Drive 4×2</h4>
            <div class="car-details">
                <p class="price">Precio: 21,995 €</p>
                <p class="mileage">Kilometraje: 6,500 km</p>

            </div>
        </article>
        <article class="car-article">
            <img src="https://mobility.caetanoretail.es/wp-content/uploads/2024/09/rifter_gt.png" alt="Ford Puma 2023"
                class="car-image">
            <h4>Peugeot Rifter GT Long BlueHDi</h3>
                <div class="car-details">
                    <p class="price">Precio: 21,995 €</p>
                    <p class="mileage">Kilometraje: 6,500 km</p>

                </div>
        </article>


    </section>
    <section id="contact">
        <h2>Contáctanos</h2>


        <h4>Ante cualquier duda, no dudes en rellenar el formulario para ponernos en contacto. Además tenemos soporte
            24/7</h4>
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
    <footer></footer>
</body>
</html>