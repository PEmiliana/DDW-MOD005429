<?php
if(!isset($_GET['carIndex']))
{
    $carIndex = "?";
}
else
{
    $carIndex = $_GET['carIndex'];
}

require('databaseTemplate.php');

$prepare = $pdo->prepare("SELECT * FROM cars WHERE carIndex = ?");
$prepare->execute([$carIndex]);
while($row = $prepare->fetch())
{
    echo $row['make'].", ";
    echo $row['model'].", ";
    echo $row['Reg'].", ";
    echo $row['colour'].", ";
    echo "£".$row['price'];
    echo "<hr>";
}
?>
