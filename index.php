<?php
require_once 'Carrinho.php';

$carrinho = new Carrinho();

echo "<h2>===== Caso 1 =====</h2>";

echo "<p>" . $carrinho->addProduct(1, 2) . "</p>";
echo "<p>" . $carrinho->addProduct(3, 3) . "</p>";

echo "<h3>Carrinho Atual:</h3>";
echo "<pre>";
print_r($carrinho->mostrarCarrinho());
echo "</pre>";

echo "<h3>Produtos (com estoque atualizado):</h3>";
echo "<pre>";
print_r($carrinho->mostrarProdutos());
echo "</pre>";

echo "<h2>===== Caso 2 =====</h2>";
echo "<p>" . $carrinho->addProduct(3, 5) . "</p>";

echo "<h2>===== Caso 3 =====</h2>";

echo "<p>" . $carrinho->addProduct(2, 1) . "</p>";

echo "<p>" . $carrinho->removeProduct(2, 1) . "</p>";

echo "<h3>Carrinho Atual:</h3>";
echo "<pre>";
print_r($carrinho->mostrarCarrinho());
echo "</pre>";

echo "<h3>Produtos (com estoque restaurado):</h3>";
echo "<pre>";
print_r($carrinho->mostrarProdutos());
echo "</pre>";


$total = $carrinho->calcularTotal();
echo "Total antes do desconto: R$ " . number_format($total, 2, ',', '.') . PHP_EOL;


$cupom = "DESCONTO10";
echo $carrinho->aplicarDesconto($cupom) . PHP_EOL;