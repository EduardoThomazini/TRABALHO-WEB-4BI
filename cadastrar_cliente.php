<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
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
        <legend>Cadastrar Cliente</legend>
        <form action="salvar_cliente.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" required>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <input type="submit" value="Salvar Cliente">
        </form>
    </fieldset>
</body>
</html>