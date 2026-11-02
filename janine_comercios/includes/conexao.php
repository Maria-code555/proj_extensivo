
<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "janine_comercios";

$con = new mysqli($host, $usuario, $senha, $banco);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

$con->set_charset("utf8mb4");

echo "Conexão realizada com sucesso!";
?>
