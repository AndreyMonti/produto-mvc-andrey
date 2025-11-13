# Product Manager (MVC) - PHP + PDO

Aplicação exemplo em MVC para gerenciar produtos (nome, preço, categoria).
Funcionalidades:
- Listar produtos
- Adicionar novo produto
- Editar produto
- Excluir produto

## Instalação rápida
1. Copie a pasta `produto-mvc-andrey` para o diretório público do seu servidor (ex: `htdocs` ou `www`).
2. Crie um banco de dados MySQL (ex: `mvc_andrey_produto`) e importe `sql/create_db.sql`.
3. Abra `config.php` e ajuste `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
4. Acesse via navegador, ex: `http://localhost/produto-mvc-andrey/index.php`.

## Observações
- Arquivos principais:
  - `index.php` (front controller / roteador simples)
  - `controllers/ProductController.php`
  - `models/Product.php`
  - `views/` (templates)
  - `assets/` (css, js)
- Remova/ajuste permissões conforme necessário.
