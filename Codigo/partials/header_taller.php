<header>
        <div class="header-container">
            <div class="logo">
                <a href="taller.php"><img src="./assets/img/fotoperfil2.png" alt="Logo del usuario" /></a>
            </div>
            <?php echo $_SESSION['usuario'];?>
            <nav class="navbar">
                <ul>

                    <li><a href="./calendar.php">Calendario</a></li>
                    <li><a href="./clientes.php">Clientes</a></li>
                    <li><a href="./cerrarsesion.php">Cerrar sesión</a></li>
                </ul>
            </nav>
            <!-- Menú Hamburguesa -->
            <div class="hamburger" onclick="activarMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>