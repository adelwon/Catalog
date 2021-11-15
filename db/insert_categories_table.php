<?php

$config = require '../config.php';
require_once 'connect.php';

$pdo = connect($config['host'], $config['dbname'], $config['user'], $config['pass']);

$names = [
    'Ноутбуки',
    'Планшеты',
    'Монітори',
    'Процесори'
];

$sql = 'INSERT INTO categories(name) VALUES(:name)';

$statement = $pdo->prepare($sql);

foreach ($names as $name) {
    $statement->execute([
        ':name' => $name
    ]);
}
