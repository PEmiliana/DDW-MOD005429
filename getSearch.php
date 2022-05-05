<?php
include "databaseTemplate.php";
$make = $_GET['make'];
$model = $_GET['model'];
$host = 'localhost';
$db   = 'cars';
$user = 'root';
$pass = 'pasw0rdmysql';
$charset = 'utf8mb4';


    $stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model');
    $stmt->execute(['make' => $make, 'model' => $model]);

    while ($row = $stmt->fetch())
    {    echo "<h1>";   
         echo $row['make'];  
         echo " - ";
         echo $row['model'];
         echo " - ";
         echo "<a href='carDetails.php?carIndex=" . $row['carIndex'] . "'> click here </a>";
    }
    
?>

