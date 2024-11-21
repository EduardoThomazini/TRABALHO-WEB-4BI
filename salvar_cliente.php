<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "INSERT INTO clientes (nome, endereco, telefone, email) VALUES ('$nome', '$endereco', '$telefone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Novo cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
