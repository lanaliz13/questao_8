<?php
include 'conexao.php';

$total_compra = 0;
$itens_com_desconto = 0;

$query = "SELECT * FROM carrinho";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$carrinho = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

foreach ($carrinho as $produto) {
    $subtotal = $produto["quantidade"] * $produto["preco_unitario"];

    if ($produto["quantidade"] > 1 && $produto["preco_unitario"] > 50) {
        $subtotal *= 0.9;
        $itens_com_desconto++;
    }

    $total_compra += $subtotal;
}

if ($itens_com_desconto >= 2) {
    $total_compra *= 0.95;
}

echo "Total da Compra: R$ " . number_format($total_compra, 2, ',', '.');
?>
