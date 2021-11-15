<?php

$config = require '../config.php';
require_once 'connect.php';

$pdo = connect($config['host'], $config['dbname'], $config['user'], $config['pass']);

$sql = "INSERT INTO products (category_id, name_product, price, short_description) VALUES 
            ('1', 'HP Pavilion Gaming', '29999', 'Игровой ноутбук HP Pavilion поможет добиться успеха в любом деле. Процессор AMD Ryzen и дискретный графический адаптер работают вместе, чтобы ускорить выполнение любых задач. Приготовься к новому уровню мощности.'), 
            ('1', 'Asus Laptop X515EA-BQ880', '13999', 'Asus Laptop 15 X515EA – это универсальный ноутбук начального уровня, объединяющий в себе стильный дизайн и современные технологии.'), 
            ('2', 'Lenovo Tab P11 LTE', '9999', 'Одно из главных преимуществ планшета Lenovo Tab P11 — это высочайшее качество изображения, которое достигается благодаря потрясающему 11-дюймовому дисплею TDDI с разрешением 2K и матрицей IPS.')";

$statement = $pdo->exec($sql);
