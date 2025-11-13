<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc_andrey_produto');
define('DB_USER', 'root');
define('DB_PASS', '');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {

    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
session_start();
