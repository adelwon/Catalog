<?php

$config = require '../config.php';
require_once 'connect.php';

$pdo = connect($config['host'], $config['dbname'], $config['user'], $config['pass']);

$pdo->exec('
    CREATE TABLE categories(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    );
    CREATE TABLE products
    (
        id                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        category_id       INT UNSIGNED NOT NULL,
        name_product              VARCHAR(30) NOT NULL,
        price             NUMERIC     NOT NULL,
        short_description TEXT,
        FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
    )
');
