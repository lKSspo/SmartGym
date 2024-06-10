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

$feedback = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Validar e limpar os dados (aqui você pode adicionar mais validações conforme necessário)

    // Enviar por Email
    $to = 'alessandroquintas3@gmail.com';
    $subject = 'Novo Contato do Site';
    $body = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $feedback = "Mensagem enviada por email com sucesso!";
    } else {
        $feedback = "Falha ao enviar a mensagem por email.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/contact.css">
    <title>Entre em Contato</title>
</head>
<body>
    <div class="icone"><?php echo $primeiraLetra; ?></div> 

    <div class="main">
        <form action="https://api.staticforms.xyz/submit" method="POST" name="dados" onSubmit="return sendEmail();">
            <h1>Entre em Contato</h1>
            <div class="forms">
                <div class="form-group">
                    <label for="name" class="label-name" >Nome:</label>
                    <input type="text" class="input-name" id="name" name="name" ><br><br>
                </div>

                <div class="form-group">
                    <label for="email" class="label-email">Email:</label>
                    <input type="email" class="input-email" id="email" name="email" ><br><br>
                </div>

                <div class="form-group">
                    <label for="message" class="textArea-label">Mensagem:</label>
                    <textarea id="messagem" class="textArea" name="message" ></textarea><br><br>
                </div>
            </div>
            <div class="send-email">
                <button type="submit" class="button" action="">Enviar</button>
            </div>
            <input type="hidden" name="accessKey" value="79fee67a-f9b1-4c7a-a1f0-c49276e63b9b">
             <input type="hidden" name="redirectTo" value="http://localhost/fluxo-users/src/views/contact.php"/>
        </form>
    </div>
    <script src="./script/contactValidation.js"></script>
</body>
</html>