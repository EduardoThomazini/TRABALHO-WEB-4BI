<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome_produto = $_POST['nome_produto'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO produtos (nome_produto, preco, estoque) VALUES ('$nome_produto', '$preco', '$estoque')";

if ($conn->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
