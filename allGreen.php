<table>
<tr>
<th>Make</th><th>Model</th><th>Reg</th><th>Colour</th><th>Photo</th>
</tr>
<?php

require 'databaseTemplate.php';

$stmt = $pdo->query('SELECT * FROM cars WHERE colour="green" ');


while($row = $stmt->fetch())
{
    echo "<tr>";
    echo "<td>" . $row['make']."</td><td>". $row['model']. 
    "</td><td>". $row['Reg']. "</td><td>". $row['colour'] . "</td><td><img src='pictures/" . $row['picture'] ."</td>";
    echo "</tr>";
}


?>
</table

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
