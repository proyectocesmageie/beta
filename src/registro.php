<?php
include("config/database/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Sanitizar y proteger datos
    $nombre = pg_escape_string($conn, $nombre);
    $correo = pg_escape_string($conn, $correo);
    $contraseña = pg_escape_string($conn, $contraseña);

    

 // Encriptar contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Verificar si el correo ya existe
      $verificar = pg_query($conn, "SELECT * FROM usuario WHERE correo = '$correo'");
    if (pg_num_rows($verificar) > 0) {
        echo "<script>alert('⚠️ Este correo ya está registrado.'); window.history.back();</script>";
        exit;
    }

   


    // Insertar en la base de datos
    $sql = "INSERT INTO usuario (nombre, correo, contraseña) 
            VALUES ('$nombre', '$correo', '$contraseña_hash')";

    $resultado = pg_query($conn, $sql);

    if ($resultado) {
        echo "<script>alert('✅ Usuario registrado correctamente.'); window.location.href='sigin.html';</script>";
    } else {
        echo "<script>alert('❌ Error al registrar: " . pg_last_error($conn) . "'); window.history.back();</script>";
    }
}
?>
