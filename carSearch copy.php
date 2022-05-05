<?php

if(!isset($_GET['make']))

{

    $make = "?";

}

else

{

    $make = $_GET['make'];

}

if (!isset($_GET['model']))

{

    $model = "?";

}

else

{

    $model = $_GET['model'];

}

$host = 'localhost';

$db   = 'cars';

$user = 'root';

$pass = 'pasw0rdmysql';

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [    

PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    

PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    

PDO::ATTR_EMULATE_PREPARES   => false,];

try 

{    

    $pdo = new PDO($dsn, $user, $pass, $options);

} 

catch (\PDOException $e) 

{     

    throw new \PDOException($e->getMessage(), (int)$e->getCode());

}

$prepare = $pdo->prepare("SELECT * FROM cars WHERE make = ? AND model = ?");

$prepare->execute([$make, $model]);

while($row = $prepare->fetch())

{

    echo $row['make'].",";

    echo $row['model'].",";

    echo $row['Reg'].",";

    echo $row['colour'].",";

    echo "<a href='selectCar.php?carIndex=";

    echo $row['carIndex'];

    echo "'>link</a>";

    echo "<hr>";

}

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
