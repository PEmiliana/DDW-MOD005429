<?php
require 'databaseTemplate.php';

$firstName = $_POST['firstName'];
$surname = $_POST['surname'];
$password = $_POST['password'];


    $stmt = $pdo->prepare("INSERT INTO `Customer`(`firstName`, `surname`,  `password`) VALUES (:firstName,:surname,:password)");
    $stmt->bindParam(':firstName',$firstName, PDO::PARAM_STR);
    $stmt->bindParam(':surname',$surname, PDO::PARAM_STR);
    $stmt->bindParam(':password',$password, PDO::PARAM_STR);
   
    $stmt->execute();

    
    

    
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ems Dealership1</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    .content {
    top: 50%;

left: 50%;

transform: translate(-50%, -50%) scale(0);

background: transparent;

width: 80%;

height: 80%;

z-index: 3;

text-align: center;

padding: 20px;

box-sizing: border-box;
}
</style>
</head>
<body>

    
    <h2>Succesfuly Registerd</h2> 
    <a href="index.php">Return to Log In page</a>
   
  
</body>

</html>