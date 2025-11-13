<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/controllers/ProductController.php';

$controller = new ProductController($pdo);

// roteador simples via query param "action"
$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'list':
    default:
        $controller->index();
        break;
}
