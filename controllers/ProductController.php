<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;
    public function __construct(PDO $pdo) {
        $this->productModel = new Product($pdo);
    }

    public function index() {
        $products = $this->productModel->all();
        require __DIR__ . '/../views/products/list.php';
    }

    public function create() {
        $product = null;
        $action = 'store';
        require __DIR__ . '/../views/products/form.php';
    }

    public function store() {
        $name = trim($_POST['name'] ?? '');
        $price = $_POST['price'] ?? '0';
        $category = trim($_POST['category'] ?? '');
        $errors = [];

        if ($name === '') $errors[] = 'Nome é obrigatório';
        if ($category === '') $errors[] = 'Categoria é obrigatória';
        if (!is_numeric($price)) $errors[] = 'Preço inválido';

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: index.php?action=create');
            exit;
        }

        $this->productModel->create($name, $price, $category);
        $_SESSION['success'] = 'Produto criado com sucesso';
        header('Location: index.php');
    }

    public function edit($id) {
        $product = $this->productModel->find($id);
        if (!$product) {
            $_SESSION['errors'] = ['Produto não encontrado'];
            header('Location: index.php');
            exit;
        }
        $action = 'update&id=' . $id;
        require __DIR__ . '/../views/products/form.php';
    }

    public function update($id) {
        $name = trim($_POST['name'] ?? '');
        $price = $_POST['price'] ?? '0';
        $category = trim($_POST['category'] ?? '');
        $errors = [];

        if ($name === '') $errors[] = 'Nome é obrigatório';
        if ($category === '') $errors[] = 'Categoria é obrigatória';
        if (!is_numeric($price)) $errors[] = 'Preço inválido';

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: index.php?action=edit&id=' . $id);
            exit;
        }

        $this->productModel->update($id, $name, $price, $category);
        $_SESSION['success'] = 'Produto atualizado com sucesso';
        header('Location: index.php');
    }

    public function delete($id) {
        // delete via GET for simplicity; in production prefer POST/CSRF protection
        $this->productModel->delete($id);
        $_SESSION['success'] = 'Produto excluído';
        header('Location: index.php');
    }
}
