
<?php
require_once('includes/conexao.php');

$p = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM clientes WHERE email = '$email' ";

    if ($stmt = $con->prepare($sql)) {

        $stmt->execute();

        $resultado = $stmt->get_result();
        $login = $resultado->fetch_assoc();

        if ($login && password_verify($senha, $login['senha'])) {

            session_start();
            $_SESSION['sessao'] = $login['id_cliente'];
            header('Location: tela_inicial.php');
            exit;

        } else {
            $p = "E-mail ou senha inválidos, tente novamente!";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="login.php" method="post">

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <input type="submit" value="Entrar">

        <p><?php echo $p; ?></p>

    </form>

</body>
</html>
