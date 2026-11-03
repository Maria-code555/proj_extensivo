<?php
require_once('includes/conexao.php');

$p = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'] ?? ''; //RECEBE O EMAIL DIGITADO//
    $senha = $_POST['senha'] ?? ''; //RECEBE A SENHA DIGITADA

    $sql = "SELECT * FROM clientes WHERE email = '$email' "; //USA UM SELECT PARA BUSCAR NO BANCO DE DADOS UM CLIENTE COM ESSE EMAIL

    if ($stmt = $con->prepare($sql)) { //CASO RECEBA ALGUM RESULTADO

        $stmt->execute(); // EXECUTA O $sql

        $resultado = $stmt->get_result(); //RECEBE O RESULTADO DA CONSULTA
        $login = $resultado->fetch_assoc(); //COLOCA O RESULTADO NUM ARRAY

        if ($login && password_verify($senha, $login['senha'])) { // CASO O LOGIN E A VEREIFICAÇÃO DA SENHA DE CERTO

            session_start(); //INICIA UMA SESSAO(ISSO POSSIBILITA USUARIOS MULTIPLOS)
            $_SESSION['sessao'] = $login['id_cliente']; // CADA SESSAO TEM COMO CODIGO SEU ID_cliente
            header('Location: tela_inicial.php'); // direciona para a tela inicial agora logado
            exit; // desnecessario (IA MALUCA)
        } else {
            $p = "E-mail ou senha inválidos, tente novamente!"; // CASO NÃO RETORNE NENHUM EMAIL OU A VERIFICAÇÃO DA SENHA DE ERRADO
        }

        $stmt->close(); // encerra a consulta
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <header>isa vai fazer</header>
    <main>

        <!-- IMAGEM LATERAL QUE FICA DO LADO DO FORMULARIO DE LOGIN -->
        <figure class="figure_login">
            <img src="https://images.unsplash.com/photo-1748543668646-e81cda0890f3?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&q=80&w=1000" alt="">

            <div class="texto_imagem">
                <p> BEM-VINDA DE VOLTA</p>
                <h1>Seu cuidado continua por aqui.</h1>
                <P>Acesse sua conta para acompanhar pedidos e finalizar suas escolhas.</P>
            </div>
        </figure>


        <!-- TAG PARA ESTILIZAR O FORMULARIO -->
        <section class="login_container">

            <div class="form_text">
                <h3>Acesse sua conta</h3>
                <h1>Que bom ter você aqui.</h1>
                <p>Entre para continuar sua compra.</p>
            </div>

            <form action="login.php" method="post" class="form_login">

                <div class="form_div">
                    <label for="email">E-mail ou CPF</label>
                    <input type="text" id="email" name="email" placeholder="seu@email.com" required>
                    <small>Administrador: use admin@gmail.com</small>
                </div>

                <div class="form_div">
                    <div class="senha_header">
                        <label for="senha">Senha</label>
                        <a href="#">Esqueci minha senha</a>
                    </div>

                    <input type="password" id="senha" name="senha" placeholder="••••••••" required>
                </div>

                <input type="submit" value="Entrar e continuar">

                <p class="mensagem"><?php echo $p; ?></p>

                <div class="cadastro">
                    <p>Ainda não tem cadastro? <a href="cadastro.php">Criar conta</a></p>
                </div>

            </form>

        </section>
    </main>
    <footer>isa vai fazer</footer>
</body>

</html>