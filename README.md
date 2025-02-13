# 🛒 Sistema de Controle de Estoque para Mercadinho

Um projeto desenvolvido com **Laravel 11** e **MySQL**, focado no gerenciamento de produtos, categorias, vendas, clientes e despesas. O sistema permite um controle eficiente do estoque e exibe um histórico detalhado das vendas.

## 📂 Estrutura do Projeto

O projeto segue a estrutura padrão do Laravel 11. Aqui estão os principais diretórios e arquivos utilizados:

- **`routes/web.php`**: Define as rotas do sistema.
- **`app/Http/Controllers`**:
  - **CategoriaController.php**: Gerencia as categorias dos produtos.
  - **ProdutoController.php**: Gerencia os produtos.
  - **ClienteController.php**: Gerencia os clientes.
  - **VendaController.php**: Gerencia as vendas e atualiza o estoque.
  - **DespesaController.php**: Gerencia as despesas do mercadinho.
- **`app/Models`**:
  - **Categoria.php**: Modelo das categorias.
  - **Produto.php**: Modelo dos produtos.
  - **Cliente.php**: Modelo dos clientes.
  - **Venda.php**: Modelo das vendas.
  - **Despesa.php**: Modelo das despesas.
- **`resources/views`**: Contém as views do sistema, utilizando **Blade** e **Bootstrap** para estilização.
- **`database/migrations`**: Contém as migrações para criação das tabelas no banco de dados.

## 🚀 Funcionalidades

- **Cadastro e gerenciamento de produtos, categorias, clientes e despesas.**
- **Registro de vendas e atualização automática do estoque.**
- **Confirmação antes de excluir registros.**
- **Adição de categorias diretamente na tela de cadastro de produtos.**
- **Exibição de detalhes dos produtos vendidos na listagem de vendas.**
- **Imagens dos produtos redimensionadas automaticamente para um tamanho padrão.**
- **Interface moderna e responsiva com um template profissional em tons de verde.**

## 🛠️ Tecnologias Utilizadas

- **Laravel 11**
- **PHP 8.2**
- **MySQL**
- **Bootstrap 5** (para estilização)
- **Blade** (engine de templates do Laravel)
- **Intervention Image** (para manipulação de imagens)

## 📦 Instalação e Configuração

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/mercadinho.git
   cd mercadinho
   ```
2. **Instale as dependências:**
   ```bash
   composer install
   ```
3. **Crie o arquivo `.env` e configure o banco de dados:**
   ```bash
   cp .env.example .env
   ```
   **Edite o `.env` com suas credenciais do MySQL:**
   ```env
   DB_DATABASE=mercadinho
   DB_USERNAME=root
   DB_PASSWORD=sua_senha
   ```
4. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```
5. **Execute as migrações:**
   ```bash
   php artisan migrate
   ```
6. **Inicie o servidor local:**
   ```bash
   php artisan serve
   ```
7. **Acesse o projeto no navegador:**
   ```
   http://127.0.0.1:8000
   ```

## 🗑️ Confirmação de Exclusão

Antes de excluir um registro, uma confirmação será exibida para evitar exclusões acidentais.

## ✅ Melhorias Futuras

- Implementar um relatório detalhado de vendas e estoque.
- Adicionar gráficos interativos para análise de vendas.
- Melhorar a interface com componentes dinâmicos (ex.: Vue.js ou Livewire).

## 📄 Licença

Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.

## 👨‍💻 Desenvolvido por:

Marcela Bezerra de Medeiros | Lanna Maria Ibiapina da Silva Mesquita | Maria Lauriane do Nascimento Galeno | Pamela Roberto da Silva

