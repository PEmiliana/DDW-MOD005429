
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

$carIndex =$_GET['carIndex'];

require 'databaseTemplate.php';

    $stmt = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex ');
    $stmt->execute([$carIndex]);

    while ($row = $stmt->fetch())
    {    echo "<h1>";   
         echo $row['make'];  
         echo " - ";
         echo $row['model'];
         echo " - ";
         echo $row['colour'];  
         echo " - ";
         echo $row['price'];
         echo " - ";
         echo $row['Reg'];  
         echo " - ";
         echo $row['miles'];
         echo " - ";
         echo $row['town'];  
         echo " - ";
         echo $row['description'];
         echo " - ";
         echo $row['region'];  
         echo " - ";
         echo $row['dealer'];  
         echo " - ";
         echo $row['telephone'];
         echo " - ";
         echo "<img src='pictures/".$row['picture']."' width='200px'>";
    
        echo "<H1>Please enter your details</H1>

        <H2> Name </H2>
	
         <form action='insertCustomer.php' method='POST'>
        
         <input type='text' name='firstName'>
         <H2> Surnameame </H2>
         <input type='text' name='surname'>
         <H2> Password </H2>
         <input type='text' name='password'>
         <H2> Card Details</H2>
         <input type='text' name='cardDetails'>
         <H2> CVV Number (the 3 numebers at theback of your card) </H2>
         <input type='text' name='cVV'>
         <H2> Address </H2>
         <input type='text' name='cAddress'>
         <input type='hidden' name='carIndex' value='".$carIndex."' >
         <input type='submit' value='Buy Now'>
         
         </form>";
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
