<?php
session_start(); // iniciar sesión
include("config/database/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $correo = pg_escape_string($conn, $correo);
    $contraseña = pg_escape_string($conn, $contraseña);

    $query = "SELECT * FROM usuario WHERE correo = '$correo'";
    $resultado = pg_query($conn, $query);

    if (pg_num_rows($resultado) == 1) {
        $usuario = pg_fetch_assoc($resultado);
        $hash = $usuario['contraseña'];

        if (password_verify($contraseña, $hash)) {
            $_SESSION['nombre'] = $usuario['nombre']; // guardamos nombre
            $_SESSION['id_usuario'] = $usuario['id_usuario']; // para publicar
            $_SESSION['correo'] = $usuario['correo']; // opcional

            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('❌ Contraseña incorrecta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Correo no registrado'); window.history.back();</script>";
    }
}
?>

