<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        fieldset {
            background-color: #e6f7ff;
            border-radius: 8px;
            padding: 20px;
            width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions a {
            margin-right: 10px;
            color: #4CAF50;
            text-decoration: none;
        }
        .actions a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Controle de Produtos</legend>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "loja");

            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            $sql = "SELECT id_produto, nome_produto, preco, estoque FROM produtos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nome_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars(number_format($row['preco'], 2, ',', '.')) . "</td>";
                    echo "<td>" . htmlspecialchars($row['estoque']) . "</td>";
                    echo "<td class='actions'>
                            <a href='editar_produto.php?id=" . htmlspecialchars($row['id_produto']) . "'>Editar</a>
                            <a href='excluir_produto.php?id=" . htmlspecialchars($row['id_produto']) . "' onclick=\"return confirm('Tem certeza que deseja excluir este produto?');\">Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </fieldset>
</body>
</html>
