Nome: Miguel Pires 1999181, Vinicius Press 2003646

--------Instruções para execução-----------
É preciso instalar o xampp na maquina, logo após ter instalado é necessario aperta em start no apache, assim que estiver ligado
copie os arquivos do projeto (index.php e carrinho.php) para uma pasta dentro do xampp (C:\xampp\htdocs\carrinho\), depois de ter
feito essas etapas abra o navegador e digite: http://localhost/carrinho/
o sistema ja estará funcionando


BREVE DOCUMENTAÇÃO
------------Funcionalidades-----------

Exibe uma lista de produtos disponíveis para compra

Permite adicionar produtos ao carrinho

Atualiza a quantidade de produtos no carrinho

Remove itens do carrinho

Calcula automaticamente o valor total da compra

------------Regras de negocio-------------

Um produto só pode ser adicionado ao carrinho se estiver disponível na lista

O carrinho deve manter os itens até que sejam removidos manualmente

Quantidades negativas ou inválidas não são permitidas

O valor total é recalculado sempre que houver alteração no carrinho

---------------Limitações---------------

O sistema não possui login ou controle de usuários

Não há integração com meios de pagamento 

Os produtos estão definidos manualmente no código 

A persistência dos dados é limitada 

Interface simples, sem design avançado


--------Exemplos de uso (casos de teste)------------

teste 1– Adicionar produto ao carrinho
Ação: O usuário acessa a página inicial e clica em “Adicionar ao Carrinho” no produto Camisa Azul.
Entrada: Produto: Camisa Azul, Quantidade: 1.
Resultado esperado: O item aparece no carrinho com a quantidade definida e o valor total atualizado

teste 2 – Atualizar quantidade de um produto
Ação: No carrinho, o usuário altera a quantidade da Camisa Azul de 1 para 3.
Entrada: Nova quantidade: 3.
Resultado esperado: O carrinho exibe 3 unidades da Camisa Azul e o valor total é recalculado.

teste 3 – Remover produto do carrinho
Ação: O usuário clica em “Remover” no item Camisa Azul.
Entrada: Clique no botão “Remover”.
Resultado esperado: O item é retirado do carrinho e o total é atualizado.

teste 4 – Adicionar mais de um produto
Ação: O usuário adiciona Camisa Azul e Tênis Preto
Entrada: Produto 1: Camisa Azul, Produto 2: Tênis Preto
Resultado esperado: Ambos os itens aparecem no carrinho com seus respectivos valores, e o total exibe a soma correta
