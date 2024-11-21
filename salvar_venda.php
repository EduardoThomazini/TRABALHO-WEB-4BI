<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id_cliente = $_POST['id_cliente'];
$id_produto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];

$sql = "SELECT preco FROM produtos WHERE id_produto='$id_produto'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$preco_unitario = $row['preco'];

$total_venda = $preco_unitario * $quantidade;

$sql_venda = "INSERT INTO vendas (id_cliente, data_venda, total_venda) VALUES ('$id_cliente', CURDATE(), '$total_venda')";
$conn->query($sql_venda);
$id_venda = $conn->insert_id;

$sql_itens = "INSERT INTO itens_venda (id_venda, id_produto, quantidade, preco_unitario) VALUES ('$id_venda', '$id_produto', '$quantidade', '$preco_unitario')";
$conn->query($sql_itens);

echo "Venda registrada com sucesso!";
$conn->close();
?>
