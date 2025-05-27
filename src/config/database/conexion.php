<?php
$host     = "aws-0-us-east-2.pooler.supabase.com";
$port     = "6543";
$dbname   = "postgres";
$user     = "postgres.shhrzdpsracmacgqqaga";
$password = "Cesmag5en"; // recuerda no compartirlo públicamente

$connectionString = "
    host=$host 
    port=$port 
    dbname=$dbname 
    user=$user 
    password=$password
";

$conn = pg_connect($connectionString);

if (!$conn) {
    echo "❌ Error de conexión.";
} else {
    echo "✅ ¡Conexión exitosa a PostgreSQL en Supabase!";
}

// pg_close($conn); // puedes activarlo si quieres cerrar la conexión manualmente
?>
