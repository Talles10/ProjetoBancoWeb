<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    body {
    background-color: #f0f8ff;
    font-family: Arial, sans-serif;
    padding-top: 120px;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

header {
    background-color: #007BFF;
    color: white;
    padding: 20px;
    text-align: center;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10;
}

.content {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 40px;
    max-width: 1200px;
    width: 100%;
    padding: 20px;
}

.container {
    background-color: #007BFF;
    color: white;
    border-radius: 10px;
    padding: 30px;
    max-width: 600px;
    box-shadow: 0px 0px 10px #ccc;
    text-align: start;
    flex: 1;
}

.buttons {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    min-width: 220px;
    gap: 15px;
    margin-top: 30px;
}

button.btn-1 {
    width: 100%;
    padding: 12px 0;
    background-color: #007BFF;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-2 {
    width: 100%;
    padding: 12px 0;
    background-color:rgb(0, 139, 63);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-3 {
    width: 100%;
    padding: 12px 0;
    background-color:rgb(192, 0, 0);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-4 {
    width: 100%;
    padding: 12px 0;
    background-color:rgb(170, 0, 162);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-5 {
    width: 100%;
    padding: 12px 0;
    background-color:rgb(0, 155, 160);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-6 {
    width: 100%;
    padding: 12px 0;
    background-color:rgb(0, 0, 0);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button.btn-1:hover {
    background-color: #0056b3;
}
button.btn-2:hover {
    background-color: #0056b3;
}
button.btn-3:hover {
    background-color: #0056b3;
}
button.btn-4:hover {
    background-color: #0056b3;
}
button.btn-5:hover {
    background-color: #0056b3;
}
button.btn-6:hover {
    background-color: #0056b3;
}

p {
    margin: 10px 0;
    font-size: 20px;
}

h1 {
    font-size: 32px;
    margin-bottom: 20px;
}

</style>
<body>
    <header>
        <h1>Perfumes da Chiquinha</h1>
    </header>

    <div class="content">
        <div class="container">
            <h1>Sobre nós</h1>
            <p>Somos da empresa Perfumes da Chiquinha, somos uma loja que buscou, busca e sempre buscará o melhor atendimento e os melhores produtos</p>
            <h1>Nossos Serviços</h1>
            <p>Aqui oferecemos uma ótima experiência de vendas, com interface de usuário autêntica e bastante intuitiva...</p>
            <p>Nosso sistema é voltado para o gerenciamento de vendas, compras e estoque de produtos</p>
        </div>

        <div class="buttons">
            <a href="{{ route('Produtos.cadastro') }}"><button class="btn-1">Cadastrar Produto</button></a>
            <a href="{{ route('Clientes.cadastro') }}"><button class="btn-2">Cadastrar Cliente</button></a>
            <a href="{{ route('Fornecedores.cadastro') }}"><button class="btn-3">Cadastrar Fornecedor</button></a>
            <a href="{{ route('Funcionarios.cadastro') }}"><button class="btn-4">Cadastrar Funcionario</button></a>
            <a href="{{ route('Compras.cadastro') }}"><button class="btn-5">Cadastrar Compra</button></a>
            <a href="{{ route('Vendas.cadastro') }}"><button class="btn-6">Realizar Venda</button></a>
        </div>
    </div>
</body>
</html>