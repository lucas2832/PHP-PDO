<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$dataBsePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBsePath);

$student = new Student(null, 
    "'Lucas Martins', ''); DROP TABLE students;", 
    new DateTimeImmutable('1996-08-27')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";

$statemant = $pdo->prepare($sqlInsert);
$statemant->bindValue(1, $student->name());
$statemant->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statemant->execute()) {
    echo "Aluno incluído.";
}
