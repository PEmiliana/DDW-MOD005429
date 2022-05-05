<?php
include "databaseTemplate.php";
$make = "ford";
$model = "fiesta";
$Reg = "R";
$colour = "pink"; 
$miles = "12000";
$price = 1500;
$dealer = "Larner Motors";
$town = "Peterborough";
$telephone = "01733762255";
$description = "MOT";
$region = "E";
$picture = "fiesta.jpg";
$sql = "INSERT INTO cars (make, model, Reg, colour, miles, price, dealer, town, telephone, description,region, picture) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$make, $model, $Reg, $colour, $miles, $price, $dealer, $town, $telephone, $description, $region, $picture]);
echo "Record added";
?>

