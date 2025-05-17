<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

/*
$student = new Student(
    null, 
    "'Lucas Martins', ''); DROP TABLE students;", // tentativa de ataque
    new DateTimeImmutable('1996-08-27')
);
*/

$student = new Student(
    null, 
    "João Pedro",
    new DateTimeImmutable('1976-12-27')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statemant = $pdo->prepare($sqlInsert);
$statemant->bindValue(':name', $student->name());
$statemant->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statemant->execute()) {
    echo "Aluno incluído.";
}
