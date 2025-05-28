<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recursos Educativos - EcoWeb</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f9ed;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 10px 30px;
    }

    .buscador {
      position: relative;
      width: 300px;
    }

    .buscador input[type="text"] {
      width: 100%;
      padding: 10px 40px 10px 15px;
      border: 2px solid #ccc;
      border-radius: 25px;
      font-size: 16px;
    }

    .buscador .icono-lupa {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      font-size: 18px;
      color: #888;
    }

    .menu-right a {
      margin-left: 15px;
      color: #2e4d18;
      font-weight: bold;
      text-decoration: none;
    }

    .menu-right a:hover {
      text-decoration: underline;
    }

    .menu-right span {
      margin-left: 10px;
      font-weight: bold;
    }

    h1 {
      text-align: center;
      color: #317025;
      margin-top: 30px;
    }

    .recursos {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      padding: 30px;
    }

    .recurso {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 300px;
      transition: transform 0.2s ease-in-out;
    }

    .recurso:hover {
      transform: scale(1.03);
    }

    .recurso img {
      width: 100%;
      height: 180px;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      object-fit: cover;
    }

    .recurso .contenido {
      padding: 15px;
    }

    .recurso h3 {
      color: #317025;
      margin-bottom: 10px;
    }

    .recurso p {
      color: #333;
      font-size: 15px;
    }

    footer {
      text-align: center;
      padding: 15px;
      background-color: #dcefd3;
      color: #555;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <div class="buscador">
      <input type="text" placeholder="Buscar recursos...">
      <span class="icono-lupa">&#128269;</span>
    </div>

    <div class="menu-right">

    <?php if (isset($_SESSION['nombre'])): ?>
        <span>👋 <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <a href="logout.php">Cerrar sesión</a>
      <?php else: ?>
        <a href="sigin.html">Iniciar sesión</a>
        <a href="sigup.html">Registrarse</a>
      <?php endif; ?>
      <a href="index.php">Inicio</a>
      <a href="foro.html">Foro</a>
      <a href="juegos.html">Juegos</a>
      <a href="simulador.html">Simulador</a>

      
    </div>
  </header>

  <h1>Recursos Educativos</h1>

  <div class="recursos">
    <div class="recurso">
      <img src="./icons/Ahorro energetico.jpg" alt="Recurso 1">
      <div class="contenido">
        <h3>Guía para el ahorro energético</h3>
        <p>Descubre cómo reducir el consumo de energía en casa con consejos prácticos y fáciles de aplicar.</p>
      </div>
    </div>

    <div class="recurso">
      <img src="./icons/Energia renovables.jpeg" alt="Recurso 2">
      <div class="contenido">
        <h3>Energías renovables</h3>
        <p>Conoce cómo funcionan las energias renovables y cómo puedes implementarlos en tu hogar.</p>
      </div>
    </div>

    <div class="recurso">
      <img src="./icons/Celular.jpeg" alt="Recurso 3">
      <div class="contenido">
        <h3>Infografía: Uso consciente del celular</h3>
        <p>Aprende a optimizar la batería y cuidar tu dispositivo móvil para ahorrar energía todos los días.</p>
      </div>
    </div>
  </div>

  <footer>
    © 2025 EcoWeb - Proyecto Académico CESMAG
  </footer>

</body>
</html>
