<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        fieldset {
            background-color: #e6f7ff;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label, input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Editar Produto</legend>
        <?php
        if (isset($_GET['id'])) {
            $id_produto = $_GET['id'];

            $conn = new mysqli("localhost", "root", "", "loja");
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_produto = $_POST['nome_produto'];
                $preco = $_POST['preco'];
                $estoque = $_POST['estoque'];

                $sql = "UPDATE produtos SET nome_produto=?, preco=?, estoque=? WHERE id_produto=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdii", $nome_produto, $preco, $estoque, $id_produto);
                $stmt->execute();

                header("Location: visualizar_produto.php");
                exit();
            } else {
                $sql = "SELECT * FROM produtos WHERE id_produto=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_produto);
                $stmt->execute();
                $result = $stmt->get_result();
                $produto = $result->fetch_assoc();
            }

            $conn->close();
        }
        ?>
        <form action="" method="post">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" name="nome_produto" value="<?php echo htmlspecialchars($produto['nome_produto']); ?>" required>

            <label for="preco">Preço:</label>
            <input type="number" step="0.01" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>

            <label for="estoque">Estoque:</label>
            <input type="number" name="estoque" value="<?php echo htmlspecialchars($produto['estoque']); ?>" required>

            <input type="submit" value="Salvar Alterações">
        </form>
    </fieldset>
</body>
</html>
