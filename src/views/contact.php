<?php
session_start();

if ((!isset($_SESSION['email']) === true) && (!isset($_SESSION['password']) === true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: login.php');
    exit();
}

$logado = $_SESSION['email'];
$nome = $_SESSION['name'];
$primeiraLetra = strtoupper(substr($nome, 0, 1));
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/contact.css">
    <title>Entre em Contato</title>
</head>
<body>
    <div class="icone"><?php echo $primeiraLetra; ?></div> 

    <h1>Entre em Contato</h1>
    <form action="processar_contato.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Enviar por Email
    $to = 'seuemail@dominio.com';
    $subject = 'Novo Contato do Site';
    $body = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada por email com sucesso!<br>";
    } else {
        echo "Falha ao enviar a mensagem por email.<br>";
    }
}