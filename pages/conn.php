<?php
session_start();

// --- CONFIGURAÇÃO DO BANCO DE DADOS --- //
$servidor = "localhost";    // normalmente "localhost"
$usuario  = "root";         // usuário do banco
$senha_db = "";             // senha do banco
$banco    = "meu_banco";    // nome do banco de dados

// --- CONECTA AO BANCO --- //
$conexao = mysqli_connect($servidor, $usuario, $senha_db, $banco);

// Verifica conexão
if (!$conexao) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}
?>