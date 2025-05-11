<?php

$dataBsePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBsePath);

echo 'Conectei';

$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');
