<?php

function connect($host, $dbname, $user, $pass)
{
    $dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
