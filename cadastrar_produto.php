<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
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
        <legend>Cadastrar Produto</legend>
        <form action="salvar_produto.php" method="post">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" name="nome_produto" required>

            <label for="preco">Preço:</label>
            <input type="number" step="0.01" name="preco" required>

            <label for="estoque">Estoque:</label>
            <input type="number" name="estoque" required>

            <input type="submit" value="Salvar Produto">
        </form>
    </fieldset>
</body>
</html>