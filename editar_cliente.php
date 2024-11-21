<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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
        <legend>Editar Cliente</legend>
        <?php
        if (isset($_GET['id'])) {
            $id_cliente = $_GET['id'];

            $conn = new mysqli("localhost", "root", "", "loja");
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];

                $sql = "UPDATE clientes SET nome=?, endereco=?, telefone=?, email=? WHERE id_cliente=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $nome, $endereco, $telefone, $email, $id_cliente);
                $stmt->execute();

                header("Location: visualizar_cliente.php");
                exit();
            } else {
                $sql = "SELECT * FROM clientes WHERE id_cliente=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_cliente);
                $stmt->execute();
                $result = $stmt->get_result();
                $cliente = $result->fetch_assoc();
            }

            $conn->close();
        }
        ?>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" value="<?php echo htmlspecialchars($cliente['endereco']); ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>

            <input type="submit" value="Salvar Alterações">
        </form>
    </fieldset>
</body>
</html>
