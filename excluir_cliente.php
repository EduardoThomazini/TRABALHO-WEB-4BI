<?php
if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "loja");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Primeiro, encontra todas as vendas associadas ao cliente
    $sql_vendas = "SELECT id_venda FROM vendas WHERE id_cliente=?";
    $stmt_vendas = $conn->prepare($sql_vendas);
    $stmt_vendas->bind_param("i", $id_cliente);
    $stmt_vendas->execute();
    $result_vendas = $stmt_vendas->get_result();

    // Para cada venda, exclui os itens de venda associados
    while ($row = $result_vendas->fetch_assoc()) {
        $id_venda = $row['id_venda'];

        $sql_itens = "DELETE FROM itens_venda WHERE id_venda=?";
        $stmt_itens = $conn->prepare($sql_itens);
        $stmt_itens->bind_param("i", $id_venda);
        $stmt_itens->execute();
    }

    // Depois, exclui as vendas do cliente
    $sql_delete_vendas = "DELETE FROM vendas WHERE id_cliente=?";
    $stmt_delete_vendas = $conn->prepare($sql_delete_vendas);
    $stmt_delete_vendas->bind_param("i", $id_cliente);
    $stmt_delete_vendas->execute();

    // Finalmente, exclui o cliente
    $sql_cliente = "DELETE FROM clientes WHERE id_cliente=?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    $stmt_cliente->bind_param("i", $id_cliente);
    $stmt_cliente->execute();

    $conn->close();

    header("Location: visualizar_cliente.php");
    exit();
}
?>
