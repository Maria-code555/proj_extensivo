
<?php
require_once('includes/conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome_completo'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['telefone'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $senha = password_hash($senha, PASSWORD_DEFAULT); // criptografia para senhas

    $data = date("Y-m-d H:i:s");

    $cep = $_POST['cep'] ?? '';
    $uf = $_POST['uf'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $num = $_POST['num'] ?? '';
    $comp = $_POST['comp'] ?? '';

    if ($nome != "" && $email != "" && $tel != "" && $cpf != "" && $senha != "" && $cep != "" && $uf != "" && $rua != "" && $bairro != "" && $cidade != "" && $num != "") { // pode ser nulo não


        $sql = "SELECT id_cliente FROM clientes WHERE email = ? LIMIT 1"; // busca algum usuario com esse email
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) { // se tiver algum usuario com esse email, não haverá insert
            echo "Esse e-mail já está cadastrado!";
        } else {

            $sql = "INSERT INTO clientes(nome_cliente, email, senha, telefone, cpf)
            VALUES ('$nome', '$email', '$senha', '$tel', '$cpf')"; //  insere na tabela cliente esse novo usaurio

            $stmt = $con->prepare($sql); // prepara para executar

            if ($stmt->execute()) { // caso execute corretamente
                $id_cliente = $con->insert_id; // pega o ultimo id-cliente registrado

                $sql_ende = "INSERT INTO endereco(id_cliente, cep, UF, cidade, bairro, rua, numero, complemento)
                     VALUES ('$id_cliente', '$cep', '$uf', '$cidade', '$bairro', '$rua', '$num', '$comp')"; // insere na tabela endereço o endenreço desse usaurio

                $stmt = $con->prepare($sql_ende); // msm coisa

                if ($stmt->execute()) { // msm coisa
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
