<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos Mais Vendidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
    </style>
</head>
<body>
    <fieldset>
        <legend>Relatório de Produtos Mais Vendidos</legend>
        <?php
        $host = 'localhost';
        $dbname = 'loja';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = '
                SELECT p.id_produto, p.nome_produto, SUM(iv.quantidade) AS total_vendido
                FROM produtos p
                JOIN itens_venda iv ON p.id_produto = iv.id_produto
                GROUP BY p.id_produto
                ORDER BY total_vendido DESC
            ';
            $stmt = $pdo->query($sql);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<table>';
            echo '<tr><th>ID</th><th>Nome do Produto</th><th>Total Vendido</th></tr>';

            foreach ($produtos as $produto) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($produto['id_produto']) . '</td>';
                echo '<td>' . htmlspecialchars($produto['nome_produto']) . '</td>';
                echo '<td>' . htmlspecialchars($produto['total_vendido']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';

        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        ?>
    </fieldset>
</body>
</html>
