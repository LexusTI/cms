<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servidor  = "localhost";
$usuario   = "root";
$senha_db  = "Lexus@57111072";
$banco     = "projeto1";

$conn = mysqli_connect($servidor, $usuario, $senha_db, $banco);

if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}
?>
