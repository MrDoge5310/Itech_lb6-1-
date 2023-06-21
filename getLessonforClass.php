<?php
include("connect.php");

$classroom = $_POST["Class"];

$collections = (new MongoDB\Client)->Lb6_Var1->lessons;

$filter = ['classroom' => $classroom];

$cursor = $collections->find($filter);

$result = [];

foreach ($cursor as $document) {
    echo "Date: " . $document['date'] . "<br>";
    echo "Time: " . $document['time'] . "<br>";
    echo "Discipline: " . $document['discipline'] . "<br>";
    echo "Type: " . $document['type'] . "<br>";
    echo "Group: ";
    foreach ($document['group'] as $group) {
        echo $group . ", ";
    }
    echo "<br>";
    echo "Teacher: ";
    foreach ($document['teacher'] as $teacher) {
        echo $teacher . ", ";
    }
    echo "<br><br>";
    
    $result[] = $document;
}

echo "<script>localStorage.setItem('request', '" . json_encode($result) . "');</script>";
