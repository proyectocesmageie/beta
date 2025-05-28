<?php
session_start();
include("config/database/conexion.php");

if (!isset($_SESSION['id_usuario'])) {
  echo "<script>alert('Debes iniciar sesión'); window.history.back();</script>";
  exit;
}

$titulo = pg_escape_string($conn, $_POST['titulo']);
$descripcion = pg_escape_string($conn, $_POST['descripcion']);
$id_usuario = $_SESSION['id_usuario'];

pg_query($conn, "INSERT INTO foro (titulo, descripcion, fecha_creacion, id_usuario) 
                 VALUES ('$titulo', '$descripcion', CURRENT_DATE, $id_usuario)");

echo "<script>alert('✅ Tema publicado'); window.location.href='foro.php';</script>";
?>

