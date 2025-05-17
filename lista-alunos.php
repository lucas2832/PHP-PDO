<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';



$statement = $pdo->query('SELECT * FROM students');

/*
while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) { // trazer um a um a mémoria para realizar alguma ação
    $student = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new DateTimeImmutable($studentData['birth_date'])
    );

    echo $student->age() . PHP_EOL;
}
exit();
*/

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);