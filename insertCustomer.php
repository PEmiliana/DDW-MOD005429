<?php

$firstName = $_POST['firstName'];
$surname = $_POST['surname'];
$cardDetails = $_POST['cardDetails'];
$cVV = $_POST['cVV'];
$cAddress = $_POST['cAddress'];
$password = $_POST['password'];
$carIndex = $_POST['carIndex'];

require 'databaseTemplate.php';

$stmt = $pdo->prepare("INSERT INTO `Customer`(`firstName`, `surname`, `password`, `cardDetails`, `cVV`, `cAddress`) VALUES (:firstName,:surname, :password, :cardDetails,:cVV,:cAddress)");
$stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
$stmt->bindParam(':cardDetails', $cardDetails, PDO::PARAM_STR);
$stmt->bindParam(':cVV', $cVV, PDO::PARAM_STR);
$stmt->bindParam(':cAddress', $cAddress, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

$stmt->execute();


$stmt2 = $pdo->prepare("UPDATE cars SET purchased = 4 
    WHERE carIndex = :carIndex ");
$stmt2->bindParam(':carIndex', $carIndex, PDO::PARAM_STR);


$stmt2->execute();


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ems Dealership1</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="LogoEmS.png" />
</head>

<body>

    <div class="NavContainer">
        <div class="Nav">
            <div class="MenuOpen"><a class="active" href="#">Options <span>↓</span></a></div>
            <div class="DropdownContent">
                <ul>
                    <li><a href="CarSearch.html">Home</a></li>
                    <li><a href="history.html">Our History</a></li>
                    <li><a href="team.html">Meet The Team</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="logout.php">Sign out</a></li>
                    <li style="float:right"><a class="active" href="/ems-dealership/CarSearch.html"><img src="LogoEmS.png" alt="Logo" height="50" width="50"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="TextCentral">
        <H1>Thank you for buying your vehicle from</H1>
        <H1> Ems Dealership</H1>

        <h2>Your vehiche will be ready for collection from the branch as soon and your purchase had been procesed,
            please bring your idetification documents and the card you used to make your purchase</h2>

        <h2>Our partners at Ems Car Insurance will be more than happy to provide you with an advantageos insurance, all you need is proof of purchase from Ems Dealership</h2>
        <h3> If you would like to serch on your own for insurace, here are some other options: </h3>
        
          
                <p><a href="https://www.comparethemarket.com/">Compare The Market</a></p>
                <p><a href="https://www.gocompare.com/">Go Compare</a></p>
                <p><a href="https://www.confused.com/">Confused.com</a></p>

            
           
       

    </div>


    <div class="Container">
        <div class="PageContent">
            <p class="footer">Copyright &copy; 2022 Ems Dealership</p>
        </div>
    </div>
</body>