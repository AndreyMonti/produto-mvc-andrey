<?php
class Product {
    private $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query('SELECT * FROM products ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($name, $price, $category) {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, price, category) VALUES (?, ?, ?)');
        return $stmt->execute([$name, $price, $category]);
    }

    public function update($id, $name, $price, $category) {
        $stmt = $this->pdo->prepare('UPDATE products SET name = ?, price = ?, category = ? WHERE id = ?');
        return $stmt->execute([$name, $price, $category, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
