# Product Manager (MVC) - PHP + PDO

Aplicação exemplo em MVC para gerenciar produtos (nome, preço, categoria).
Funcionalidades:
- Listar produtos
- Adicionar novo produto
- Editar produto
- Excluir produto

Tecnologias:
- PHP 8+ (recomendado)
- MySQL (crie pelo phpMyAdmin)
- PDO (prepared statements)
- SweetAlert2 para alertas
- CSS + animações leves

## Instalação rápida
1. Copie a pasta `product-manager` para o diretório público do seu servidor (ex: `htdocs` ou `www`).
2. Crie um banco de dados MySQL (ex: `product_manager`) e importe `sql/create_db.sql`.
3. Abra `config.php` e ajuste `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
4. Acesse via navegador, ex: `http://localhost/product-manager/index.php`.

## Observações
- Arquivos principais:
  - `index.php` (front controller / roteador simples)
  - `controllers/ProductController.php`
  - `models/Product.php`
  - `views/` (templates)
  - `assets/` (css, js)
- Remova/ajuste permissões conforme necessário.
