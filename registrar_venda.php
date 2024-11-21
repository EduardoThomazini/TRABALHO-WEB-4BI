<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venda</title>
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
        label, select, input {
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
        <legend>Registrar Venda</legend>
        <form action="salvar_venda.php" method="post">
            <label for="cliente">Cliente:</label>
            <select name="id_cliente">
                <?php
                $conn = new mysqli("localhost", "root", "", "loja");
                $sql = "SELECT id_cliente, nome FROM clientes";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id_cliente']."'>".$row['nome']."</option>";
                }
                $conn->close();
                ?>
            </select>

            <label for="produto">Produto:</label>
            <select name="id_produto">
                <?php
                $conn = new mysqli("localhost", "root", "", "loja");
                $sql = "SELECT id_produto, nome_produto FROM produtos";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id_produto']."'>".$row['nome_produto']."</option>";
                }
                $conn->close();
                ?>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" required>

            <input type="submit" value="Registrar Venda">
        </form>
    </fieldset>
</body>
</html>