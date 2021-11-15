<?php

$config = require '../config.php';
require_once 'connect.php';

$pdo = connect($config['host'], $config['dbname'], $config['user'], $config['pass']);

$sql = 'SELECT *
        FROM categories
        INNER JOIN products ON categories.id = products.category_id';

$statement = $pdo->prepare($sql);
$statement->execute();
return $statement->fetchAll(PDO::FETCH_ASSOC);
