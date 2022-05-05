<?php
$host = 'localhost';
$db   = 'cars';
$user = 'root';
$pass = 'pasw0rdmysql';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,];
try 
{    $pdo = new PDO($dsn, $user, $pass, $options);
}
catch (\PDOException $e) 
{     
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
    $sql = 'UPDATE cars SET make = :make,
                 model = :model,            
                  Reg = :reg,             
                   colour = :colour,            
                    miles = :miles,              
                    price = :price,             
                    dealer = :dealer,
                    town = :town,             
                    telephone = :telephone,             
                    description = :description,              
                    region = :region,              
                    picture = :picture            
                    WHERE carIndex = :carIndex';
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->bindParam(':make', 
    $_POST['make'], PDO::PARAM_STR);       
    $sqlQuery->bindParam(':model', 
    $_POST['$model'], PDO::PARAM_STR);    
    $sqlQuery->bindParam(':reg', 
    $_POST['reg'], PDO::PARAM_STR);
    // use PARAM_STR although a number  
    $sqlQuery->bindParam(':colour', $_POST['colour'], PDO::PARAM_STR); 
    $sqlQuery->bindParam(':miles', $_POST['miles'], PDO::PARAM_STR);   
    $sqlQuery->bindParam(':price', $_POST['price'], PDO::PARAM_INT);   
    $sqlQuery->bindParam(':dealer', $_POST['dealer'], PDO::PARAM_STR); 
    $sqlQuery->bindParam(':town',  $_POST['town'], PDO::PARAM_STR); 
    $sqlQuery->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR); 
    $sqlQuery->bindParam(':description', $_POST['description'], PDO::PARAM_STR);   
    $sqlQuery->bindParam(':region', $_POST['region'], PDO::PARAM_INT);   
    $sqlQuery->bindParam(':picture', $_POST['picture'], PDO::PARAM_STR); 
    $sqlQuery->bindParam(':carIndex', $_POST['carIndex'], PDO::PARAM_INT); 
    $sqlQuery->execute();
 ?>


<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ems Dealership</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="style.css" />
<link rel="icon" href="LogoEmS.png"/>
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
                <li style="float:right"><a class="active" href="/ems-dealership/CarSearch.html"><img src="LogoEmS.png" alt="Logo" height="50" width="50"></a></li>
                </ul>
            </div>
        </div>
    </div>
     

  <div class="Container">
    <div class="PageContent">
        <p class="footer">
            Copyright &copy; 2022 Ems Dealership
        </p>
    </div>
</div>
</body>
</html>
