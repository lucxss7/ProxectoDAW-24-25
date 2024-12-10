<header>
  <div class="logo">
    <a href="./usuario.php">
      <img
        src="../assets/img/fotoperfil.png"
        alt="Logo del usuario" /></a>
  </div>
  <?php
  echo $_SESSION['usuario']; ?>
  <nav class="navbar">
    <ul>
      <li><a href="./coches.php">Mis coches</a></li>
      <li><a href="./calendar.php">Calendario</a></li>
      <li><a href='#' id="notis">Recordatorio</a></li>
      <li><a href="./form_citas.php" class="checked">Pedir Cita</a></li>
      <li><a href="./cerrarsesion.php">SALIR</a></li>
    </ul>
  </nav>
  <!-- Menú Hamburguesa -->
  <div class="hamburger" onclick="">
    <span></span>
    <span></span>
    <span></span>
  </div>

</header>