<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ems Dealership1</title>
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
                <li><a href="logout.php">Sign out</a></li>
                <li style="float:right"><a class="active" href="/ems-dealership/CarSearch.html"><img src="LogoEmS.png" alt="Logo" height="50" width="50"></a></li>
            </ul>
        </div>
    </div>
</div>
<?php
require('databaseTemplate.php');


$sqlQuery = $pdo->query('SELECT * FROM cars');
echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch())
{
    echo "<TR>";
    echo "<TD>".$row['make']."</TD>";
    echo "<TD>".$row['model']."</TD>";
    echo "<TD>".$row['carIndex']."</TD>";
    echo "<TD><a href='updateCar.php?carIndex=".$row['carIndex']."'>Edit</a>";
    echo "</TR>";
}
echo "</TABLE>";
?>

<div class="Container">
    <div class="PageContent">
        <p class="footer">
            Copyright &copy; 2022 Ems Dealership
        </p>
    </div>
</div>
