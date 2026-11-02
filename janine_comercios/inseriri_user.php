
<?php
require_once('includes/conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome_completo'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['telefone'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $data = date("Y-m-d H:i:s");

    $cep = $_POST['cep'] ?? '';
    $uf = $_POST['uf'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $num = $_POST['num'] ?? '';
    $comp = $_POST['comp'] ?? '';

    if ($nome != "" && $email != "" && $tel != "" && $cpf != "" && $senha != "" && $cep != "" && $uf != "" && $rua != "" && $bairro != "" && $cidade != "" && $num != "") {


        $sql = "SELECT id_cliente FROM clientes WHERE email = ? LIMIT 1";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            echo "Esse e-mail já está cadastrado!";
        } else {

            $sql = "INSERT INTO clientes(nome_cliente, email, senha, telefone, cpf)
            VALUES ('$nome', '$email', '$senha', '$tel', '$cpf')";

            $stmt = $con->prepare($sql);

            if ($stmt->execute()) {
                $id_cliente = $con->insert_id;

                $sql_ende = "INSERT INTO endereco(id_cliente, cep, UF, cidade, bairro, rua, numero, complemento)
                     VALUES ('$id_cliente', '$cep', '$uf', '$cidade', '$bairro', '$rua', '$num', '$comp')";

                $stmt = $con->prepare($sql_ende);

                if ($stmt->execute()) {
                    echo "Cliente e endereço cadastrados com sucesso!";
                } else {
                    echo "Erro ao cadastrar endereço.";
                }
            } else {
                echo "Erro ao cadastrar cliente.";
            }
        }
    } else {
        echo "Preencha todos os campos obrigatórios!";
    }
}
?>
