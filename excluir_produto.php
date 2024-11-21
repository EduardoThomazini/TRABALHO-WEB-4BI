<?php
if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "loja");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Exclui os registros de itens_venda que fazem referência ao produto
    $sql_itens = "DELETE FROM itens_venda WHERE id_produto=?";
    $stmt_itens = $conn->prepare($sql_itens);
    $stmt_itens->bind_param("i", $id_produto);
    $stmt_itens->execute();

    // Exclui o produto
    $sql_produto = "DELETE FROM produtos WHERE id_produto=?";
    $stmt_produto = $conn->prepare($sql_produto);
    $stmt_produto->bind_param("i", $id_produto);
    $stmt_produto->execute();

    $conn->close();

    header("Location: visualizar_produto.php");
    exit();
}
?>
