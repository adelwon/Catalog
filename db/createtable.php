<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

$config = require '../config.php';
require_once 'connect.php';

$pdo = connect($config['host'], $config['dbname'], $config['user'], $config['pass']);


$pdo->exec('
    CREATE TABLE categories(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        created_at TIMESTAMP
    );
    CREATE TABLE products
    (
        id                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        category_id       INT UNSIGNED NOT NULL,
        name              VARCHAR(30) NOT NULL,
        price             NUMERIC     NOT NULL,
        short_description TEXT,
        created_at        TIMESTAMP,
        FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
    )
');



