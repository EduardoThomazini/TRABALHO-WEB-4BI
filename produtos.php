<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .menu {
            display: flex;
            gap: 20px;
        }
        .menu a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 150px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .menu a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="cadastrar_produto.php">CADASTRAR PRODUTOS</a>
        <a href="visualizar_produto.php">VISUALIZAR PRODUTOS</a>
    </div>
</body>
</html>