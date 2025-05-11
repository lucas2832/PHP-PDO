<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$dataBsePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBsePath);

$student = new Student(null, 'Lucas Martins', new DateTimeImmutable('1996-08-27'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

echo $sqlInsert;

var_dump($pdo->exec($sqlInsert));