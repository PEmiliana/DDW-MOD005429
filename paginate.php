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
$numberOfRecords = 8;
if (!isset($_GET['page'])) {
    $pageNumber = 1;
    $offset = 0;
} else {
    $pageNumber = $_GET['page'];
    if ($pageNumber < 1) {
        $pageNumber = 1;
    }
    $offset = ($pageNumber - 1) * $numberOfRecords;
}

$next = $pageNumber + 1;
$previous = $pageNumber - 1;


require('databaseTemplate.php');

$sqlQuery = ("SELECT * from cars ORDER BY Reg 
 LIMIT " . $offset . "," . $numberOfRecords);

$sql = $pdo->prepare($sqlQuery);
$sql->execute();

$sqlCount = ("SELECT * from cars");

$sqls = $pdo->prepare($sqlCount);
$sqls->execute();

$numberOfCars = $sqls->rowCount();

$numberOfCar = round($numberOfCars / 8);

echo "<a href= 'paginate.php?carNumber=$numberOfCars'>$numberOfCars</a>";
echo "<table border =1>";
echo "<tr>";

echo "<th>Make</th>";
echo "<th>Model</th>";
echo "<th>Registration</th>";

echo "</tr>";

while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>";
    echo $result['make'];
    echo "</td>";

    echo "<td>";
    echo $result['model'];
    echo "</td>";

    echo "<td>";
    echo $result['Reg'];
    echo "</td>";
}
echo "</table>";
#test

echo "<a href= 'paginate.php?page=$previous'>Previous</a>";
echo " | ";
echo "<a href= 'paginate.php?pageNumber=$pageNumber'>$pageNumber</a>";
echo " of ";
echo "<a href= 'paginate.php?pageNumber=$numberOfCar'>$numberOfCar</a>";
echo " | ";
echo "<a href= 'paginate.php?page=$next'>Next</a>";
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
