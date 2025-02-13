<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque - Mercadinho</title>
<!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    body {
        background: url("{{ asset('images/plano_de_fundo.jpg') }}") no-repeat center center fixed;
        background-size: cover;
    }
    .navbar {
        background-color:rgb(82, 150, 85) !important; /* Verde mais escuro para destacar a logo e os menus */
    }
    .navbar .nav-link {
        color: white !important;
    }
    .navbar .nav-link:hover {
        color:rgb(137, 180, 139) !important; /* Verde claro ao passar o mouse */
    }
    .footer {
        background-color:rgba(122, 172, 124, 0.69); /* Verde pastel para suavidade */
        color:rgb(8, 50, 10); /* Verde escuro profissional */
    }
    .btn-editar {
        background-color: #A5D6A7 !important; /* Verde pastel */
        border-color: #A5D6A7 !important;
        color: #2E7D32 !important;
    }
    .btn-editar:hover {
        background-color: #81C784 !important;
    }
    .btn-excluir {
        background-color: #E57373 !important; /* Vermelho pastel */
        border-color:rgb(191, 121, 121) !important;
        color: white !important;
    }
    .btn-excluir:hover {
        background-color:rgb(191, 109, 109) !important;
    }
    .produto-imagem {
        width: 100px; /* Ajuste o tamanho conforme necessário */
        height: auto;
    }
    .navbar-brand img {
        height: 40px; /* Ajuste o tamanho da logo */
        margin-right: 10px;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"> Mercadinho
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('produtos.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendas.index') }}">Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('despesas.index') }}">Despesas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        @yield('content')
    </div>
    <footer class="text-center p-3 footer">
        &copy; 2025 Mercadinho | Todos os direitos reservados
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
