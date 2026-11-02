<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/api.js"></script>
</head>

<body>
    <form action="inseriri_user.php" method="post">
        nome: <input type="text" name="nome_completo" id="nome_completo"><br>
        email: <input type="text" name="email" id="email"><br>
        cpf: <input type="text" name="cpf" id="cpf"><br>
        telefone: <input type="text" name="telefone" id="telefone"><br><br>


        Cep: <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" onkeyup="mascaraCEP(this)"><br>
        UF: <input  type="text" name="uf" id="uf" required><br>
        Rua: <input  type="text" name="rua" id="rua" required><br>
        bairro: <input  type="text" name="bairro" id="bairro" required><br>
        cidade: <input  type="text" name="cidade" id="cidade" required><br>

        numero: <input type="number" name="num" id="num"><br>
        complemento: <input type="text" name="comp" id="comp"><br>

        senha: <input type="text" name="senha" id="senha">

        <input type="submit" value="enviar">

    </form>
</body>

</html>