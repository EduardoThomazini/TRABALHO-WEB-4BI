<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de Usuários</title>
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
        <legend>Controle de Usuários</legend>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "loja");

            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            $sql = "SELECT id_cliente, nome, endereco, telefone, email FROM clientes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_cliente']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td class='actions'>
                            <a href='editar_cliente.php?id=" . htmlspecialchars($row['id_cliente']) . "'>Editar</a>
                            <a href='excluir_cliente.php?id=" . htmlspecialchars($row['id_cliente']) . "' onclick=\"return confirm('Tem certeza que deseja excluir este cliente?');\">Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </fieldset>
</body>
</html>
