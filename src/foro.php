<?php
session_start();
include("config/database/conexion.php");

// Obtener todos los temas
$temas = pg_query($conn, "
  SELECT f.*, u.nombre 
  FROM foro f 
  JOIN usuario u ON f.id_usuario = u.id_usuario
  ORDER BY fecha_creacion DESC
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Foro - EcoWeb</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f8e9;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 10px 30px;
    }

    .menu-right a, .menu-right span {
      margin-left: 15px;
      font-weight: bold;
      color: #2e4d18;
      text-decoration: none;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
      color: #317025;
    }

    .formulario, .comentario-form {
      background-color: #eaf5d7;
      padding: 20px;
      border-radius: 10px;
      margin: 20px auto;
      width: 80%;
    }

    .formulario input, .formulario textarea,
    .comentario-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .foro-container {
      width: 80%;
      margin: auto;
    }

    .tema {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .tema h3 { color: #2e4d18; }
    .tema small { color: #777; }

    .comentarios {
      margin-top: 15px;
      padding-left: 15px;
      border-left: 3px solid #c2e59c;
    }

    .comentario {
      margin-bottom: 10px;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      padding: 15px;
      background-color: #dcefd3;
    }
  </style>
</head>
<body>

<header>
  <div><strong>EcoWeb - Foro</strong></div>
  <div class="menu-right">
    <a href="index.php">Inicio</a>
    <a href="recursos.php">Recursos</a>
    <a href="juegos.html">Juegos</a>
    <a href="simulador.html">Simulador</a>
    <?php if (isset($_SESSION['nombre'])): ?>
      <span>👋 <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
      <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
      <a href="sigin.html">Iniciar sesión</a>
    <?php endif; ?>
  </div>
</header>

<h1>Foro de Discusión</h1>

<?php if (isset($_SESSION['nombre'])): ?>
  <div class="formulario">
    <form action="foro_guardar.php" method="POST">
      <input type="text" name="titulo" placeholder="Título del tema" required>
      <textarea name="descripcion" rows="4" placeholder="Escribe tu mensaje..." required></textarea>
      <button type="submit">Publicar</button>
    </form>
  </div>
<?php endif; ?>

<div class="foro-container">
  <?php while ($row = pg_fetch_assoc($temas)): ?>
    <div class="tema">
      <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
      <p><?php echo nl2br(htmlspecialchars($row['descripcion'])); ?></p>
      <small>Publicado por <?php echo $row['nombre']; ?> | <?php echo $row['fecha_creacion']; ?></small>

      <!-- Mostrar comentarios -->
      <div class="comentarios">
        <?php
        $id_foro = $row['id_foro'];
        $comentarios = pg_query($conn, "
          SELECT c.*, u.nombre 
          FROM comentarioforo c 
          JOIN usuario u ON c.id_usuario = u.id_usuario 
          WHERE c.id_foro = $id_foro
          ORDER BY c.fecha ASC
        ");
        while ($com = pg_fetch_assoc($comentarios)):
        ?>
          <div class="comentario">
            <strong><?php echo $com['nombre']; ?>:</strong>
            <span><?php echo htmlspecialchars($com['contenido']); ?></span>
            <small style="color:#999;">(<?php echo $com['fecha']; ?>)</small>
          </div>
        <?php endwhile; ?>
      </div>

      <!-- Formulario de comentario -->
      <?php if (isset($_SESSION['nombre'])): ?>
        <div class="comentario-form">
          <form action="comentario_guardar.php" method="POST">
            <input type="hidden" name="id_foro" value="<?php echo $row['id_foro']; ?>">
            <textarea name="contenido" rows="2" placeholder="Escribe un comentario..." required></textarea>
            <button type="submit">Comentar</button>
          </form>
        </div>
      <?php endif; ?>
    </div>
  <?php endwhile; ?>
</div>

<footer>© 2025 EcoWeb - Proyecto Académico CESMAG</footer>

</body>
</html>

