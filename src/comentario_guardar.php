<?php
session_start();
include("config/database/conexion.php");

if (!isset($_SESSION['id_usuario'])) {
  echo "<script>alert('Debes iniciar sesión para comentar'); window.history.back();</script>";
  exit;
}

$id_foro = intval($_POST['id_foro']);
$contenido = pg_escape_string($conn, $_POST['contenido']);
$id_usuario = $_SESSION['id_usuario'];

pg_query($conn, "INSERT INTO comentarioforo (contenido, fecha, id_usuario, id_foro) 
                 VALUES ('$contenido', CURRENT_DATE, $id_usuario, $id_foro)");

echo "<script>window.location.href='foro.php';</script>";
?>
