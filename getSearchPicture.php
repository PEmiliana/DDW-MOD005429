
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
<?php

$make = $_GET['make'];
$model = $_GET['model'];


if(isset($_GET['colour']))
{
    $colour = $_GET['colour'];
}
if(isset($_GET['miles']))
{
    $miles = $_GET['miles'];
}
if(isset($_GET['price']))
{
    $price = $_GET['price'];
}


if(isset($_GET['region']))
{
    $region = $_GET['region'];
}
$host = 'localhost';
$db   = 'cars';
$user = 'root';
$pass = 'pasw0rdmysql';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try { 
        $pdo = new PDO($dsn, $user, $pass, $options);
    } 
catch (\PDOException $e) 
{     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
/*catch exception for colour*/
if($colour != "")
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model AND colour=:colour');
$stmt->execute(['make' => $make, 'model' => $model, 'colour' => $colour ]);
}else
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model');
$stmt->execute(['make' => $make, 'model' => $model]);
}

/*catch exception for miles*/
if($miles != "")
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model AND miles=:miles');
$stmt->execute(['make' => $make, 'model' => $model, 'miles' => $miles ]);
}else
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model');
$stmt->execute(['make' => $make, 'model' => $model]);
}

/*catch exception for price*/
if($price != "")
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model AND price=:price');
$stmt->execute(['make' => $make, 'model' => $model, 'price' => $price ]);
}else
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model');
$stmt->execute(['make' => $make, 'model' => $model]);
}

/*catch exception for region*/
if($region!= "")
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model AND region=:region');
$stmt->execute(['make' => $make, 'model' => $model, 'region' => $region ]);
}else
{
$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = :make AND model=:model');
$stmt->execute(['make' => $make, 'model' => $model]);}

while ($row = $stmt->fetch())
{    echo "<h1>";   
    echo $row['make'];
    echo " - ";
    echo $row['model'];
    echo " - ";
    echo $row['colour'];
    echo " - ";
   
    echo $row['miles'];
    echo " - ";
    echo $row['price'];
    echo " - ";
    echo $row['region'];
  
    echo "<img src='pictures/".$row['picture']."'>";
    echo "";
echo "<a href='carDetails.php?carIndex=".$row['carIndex']."'>Click for more details</a>";

}   
?>

  <div class="Container">
    <div class="PageContent">
        <p class="footer">
            Copyright &copy; 2022 Ems Dealership
        </p>
    </div>
</div>
</body>
</html>