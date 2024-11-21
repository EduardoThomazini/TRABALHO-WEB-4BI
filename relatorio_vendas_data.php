<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas por Data</title>
    <style>
        body { 
        font-family: Arial, sans-serif; 
        background-color: #f0f8ff; 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        padding: 20px; 
        }
        table { 
        border-collapse: collapse; 
        width: 80%; margin-top: 20px; }
        table, th, td { 
        border: 1px solid #ddd; 
        padding: 8px; }
        th { 
        background-color: #e6f7ff; 
        text-align: center; 
        }
        tr:nth-child(even) { 
        background-color: #f2f2f2; 
        }
        tr:hover {
        background-color: #ddd; 
        }
        form { 
        background-color: #e6f7ff; 
        padding: 20px;
        border-radius: 8px; 
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body>
    <h2>Relatório de Vendas por Data</h2>
    <form action="relatorio_vendas_data.php" method="get">
        <label for="data_venda">Data da Venda:</label>
        <input type="date" name="data_venda" required>
        <input type="submit" value="Gerar Relatório">
    </form>

    <?php
    if (isset($_GET['data_venda'])) {
        $data_venda = $_GET['data_venda'];
        $conn = new mysqli("localhost", "root", "", "loja");

        $sql = "SELECT p.nome_produto, iv.quantidade, iv.preco_unitario, (iv.quantidade * iv.preco_unitario) AS total_venda
                FROM itens_venda iv
                JOIN vendas v ON iv.id_venda = v.id_venda
                JOIN produtos p ON iv.id_produto = p.id_produto
                WHERE v.data_venda = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $data_venda);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<table>";
        echo "<tr><th>Nome do Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Total da Venda</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['nome_produto']}</td><td>{$row['quantidade']}</td><td>{$row['preco_unitario']}</td><td>{$row['total_venda']}</td></tr>";
        }
        echo "</table>";

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
