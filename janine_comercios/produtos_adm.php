<?php  
    require_once("includes/conexao.php");

    $pesquisa = $_GET['pesquisar'] ?? '';

    $sql = "SELECT
                p.id_produto,
                p.nome_prod,
                p.marca,
                p.preco,
                p.preco_promocional,
                c.nome_cat,
                COALESCE(SUM(e.quantidade), 0) AS estoque_total,
                MAX(
                    CASE
                        WHEN v.ativo = 'ativo' THEN 1
                        ELSE 0
                    END
                ) AS status_produto
            FROM produto p
            INNER JOIN categorias c
            ON p.id_categoria = c.id_categorias
            LEFT JOIN variacoes_produto v
            ON p.id_produto = v.id_produto
            LEFT JOIN estoque e
            ON v.id_variacao = e.id_variacao
            WHERE p.nome_prod LIKE ?
            OR p.marca LIKE ?
            GROUP BY p.id_produto";

    $stmt = mysqli_prepare($con, $sql);

    $termo = "%".$pesquisa."%";

    mysqli_stmt_bind_param($stmt, "ss", $termo, $termo);

    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>
    <link rel="stylesheet" href="css/produtos.css">
</head>
<body>
    <header>Administração    <img src="img/warning.png" width="20px"></header>
    <h2>CATÁLOGO</h2>
    <h1>Gerenciamento de produtos</h1>
    <p>produtos cadastrados · precisam de atenção</p>


    <form action="" method="GET">
            <input type="text" id="pesquisar" name="pesquisar" placeholder="Buscar por nome/marca" 
                        value="<?= htmlspecialchars($pesquisa) ?>">

        <button type="submit">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Compra</th>
                <th>Venda</th>
                <th>Estoque</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>


            <tbody>
                <?php
                    while ($produto = mysqli_fetch_assoc($resultado)) {
                ?>
                

                <tr>
                    <td><?= $produto['nome_prod'] ?>
                        <p><?= $produto['marca'] ?></p>
                    </td>
                    <td><?= $produto['nome_cat'] ?></td>
                    <td>--</td>
                    <td>
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        <p>
                            R$ <?= number_format($produto['preco_promocional'], 2, ',', '.') ?>
                        </p>
                    </td>
                    <td><?= $produto['estoque_total'] ?? 0 ?></td>
                    <td><?= $produto['status_produto'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                    <td><button>Editar</button>
                        <button>Excluir</button>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7">
                         Mostrando 1 resultado
                        <button>&lt;</button>
                        <button>&gt;</button>
                    </td>
                </tr>
            </tfoot>
    </table>

    <button>+ Adicionar Produto</button>
</body>
</html>