<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>EcoWeb - Plataforma Educativa</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
     
      background-image: url('./icons/Fondo.png');
      background-size: 70% auto;
      background-position: center top 200px;
      background-repeat: no-repeat;
    }

     body {
      font-family: Arial, sans-serif;
      background-color: f#b1c588;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 2px 30px;
    }

    .menu-right a,
    .menu-right span {
      color: black;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
    }

    .menu-right a:hover {
      text-decoration: underline;
    }

    main {
      height: 75vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      text-align: center;
      padding-top: 0px;
    }

    main h1 {
      font-size: 4rem;
      color: #3bb02a;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background-color: #e0e0e0;
      color: #555;
    }

    .buscador {
      position: relative;
      width: 300px;
      margin: 20px 0 20px 30px;
    }

    .buscador input[type="text"] {
      width: 100%;
      padding: 10px 40px 10px 15px;
      border: 2px solid #ccc;
      border-radius: 25px;
      font-size: 16px;
      outline: none;
    }

    .buscador .icono-lupa {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      font-size: 18px;
      color: #888;
    }
  </style>
</head>
<body>

  <header>
    <!-- Buscador -->
    <div class="buscador">
      <input type="text" placeholder="Buscar recursos, temas o juegos...">
      <span class="icono-lupa">&#128269;</span>
    </div>

    <!-- Menú de navegación -->
    <div class="menu-right">
      <a href="recursos.html">Recursos</a>
      <a href="foro.html">Foro</a>
      <a href="juegos.html">Juegos</a>
      <a href="simulador.html">Simulador</a>

      <?php if (isset($_SESSION['nombre'])): ?>
        <span>👋 <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <a href="logout.php">Cerrar sesión</a>
      <?php else: ?>
        <a href="sigin.html">Iniciar sesión</a>
        <a href="sigup.html">Registrarse</a>
      <?php endif; ?>
    </div>
  </header>

  <main>
    <h1>Uso<br> energético <br> responsable</h1>
  </main>

  <footer>
    © 2025 EcoWeb - Proyecto Académico CESMAG
  </footer>

</body>
</html>

