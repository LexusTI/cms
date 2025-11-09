<?php
session_start();
include('pages/conn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['login-email'] ?? '');
    $senha = trim($_POST['login-password'] ?? '');

    if (!empty($email) && !empty($senha)) {

        $stmt = $conn->prepare("SELECT id, nome, sobrenome, email, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id']    = $usuario['id'];
                $_SESSION['usuario_nome']  = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];

                header("Location: pages/index.php");
                exit;
            } else {
                $erro = "Email ou senha incorretos!";
            }
        } else {
            $erro = "Email ou senha incorretos!";
        }
    } else {
        $erro = "Por favor, preencha todos os campos!";
    }
}

$conn->close();
?>





<!-- <?php
// --- INÍCIO DO PHP --- //
session_start();

// Simula credenciais (pode trocar depois por banco de dados)
$usuario_correto = "admin@example.com";
$senha_correta   = "1234";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Captura os dados enviados
    $email = trim($_POST['login-email'] ?? '');
    $senha = trim($_POST['login-password'] ?? '');

    // Valida login
    if ($email === $usuario_correto && $senha === $senha_correta) {
        $_SESSION['usuario'] = $email;
        header("Location: pages/index.php"); // redireciona após login
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>