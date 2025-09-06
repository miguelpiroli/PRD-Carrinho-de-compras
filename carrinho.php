<?php

class Carrinho 
{
    private array $carrinho = [];
    private array $produtos;

    public function __construct() 
    {        
        $this->produtos = [
            ['id' => 1, 'nome' => 'Camiseta', 'preco' => 59.90, 'estoque' => 10],
            ['id' => 2, 'nome' => 'Calça Jeans', 'preco' => 129.90, 'estoque' => 5],
            ['id' => 3, 'nome' => 'Tênis', 'preco' => 199.90, 'estoque' => 3]
        ];
    }

    public function getProduct(int $idProduto)
    {
        foreach ($this->produtos as &$produto) { 
            if ($produto['id'] === $idProduto) {
                return $produto;
            }
        }
        return null;
    }

    public function addProduct(int $idProduto, int $quantidade): string 
    {
        foreach ($this->produtos as &$produto) {
            if ($produto['id'] === $idProduto) {
                
                if ($produto['estoque'] < $quantidade) {
                    return "Estoque insuficiente para '{$produto['nome']}'. Estoque disponível: {$produto['estoque']}.";
                }

                if (isset($this->carrinho[$idProduto])) {
                    $this->carrinho[$idProduto]['quantidade'] += $quantidade;
                } else {
                    $this->carrinho[$idProduto] = [
                        'id' => $produto['id'],
                        'nome' => $produto['nome'],
                        'preco' => $produto['preco'],
                        'quantidade' => $quantidade
                    ];
                }

                $produto['estoque'] -= $quantidade;
                return "Produto '{$produto['nome']}' adicionado ao carrinho com quantidade {$quantidade}.";
            }
        }
        return "Produto {$idProduto} não encontrado.";
    }

    public function removeProduct(int $idProduto, int $quantidade): string 
    {
        if (!isset($this->carrinho[$idProduto])) {
            return "Produto {$idProduto} não está no carrinho.";
        }

        $item = &$this->carrinho[$idProduto];

        if ($quantidade > $item['quantidade']) {
            return "Você tentou remover {$quantidade}, mas só há {$item['quantidade']} no carrinho.";
        }

        $item['quantidade'] -= $quantidade;

        foreach ($this->produtos as &$produto) {
            if ($produto['id'] === $idProduto) {
                $produto['estoque'] += $quantidade;
            }
        }

        if ($item['quantidade'] <= 0) {
            unset($this->carrinho[$idProduto]);
        }

        return "Produto '{$item['nome']}' removido do carrinho em quantidade {$quantidade}.";
    }

    public function showCart(): array
    {
        return $this->carrinho;
    }

    public function showProducts(): array
    {
        return $this->produtos;
    }

    public function calculateTotal(): float
    {
        $total = 0;
        foreach ($this->carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
        return $total;
    }

    public function applyDiscount (string $cupom):string 
    {
            if (strtoupper($cupom) === "DESCONTO10") {
            $desconto = 10; 
        } else {
            return "Cupom inválido.";
        }

        
        $total = 0;
        foreach ($this->carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        
        $valor_desconto = $total * ($desconto / 100);
        $preco_final = $total - $valor_desconto;

        return "Cupom aplicado: {$desconto}% de desconto. Valor final: R$ " 
            . number_format($preco_final, 2, ',', '.');
    }
}
