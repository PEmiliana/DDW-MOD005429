<?php

include "redirect.php";
include "console_log.php";
include 'databaseTemplate.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") { // Get what was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) { // Check the user entered something
        $query = $pdo->prepare("SELECT * FROM Customer WHERE idCustomer ='" . $username . "' AND password='" . $password . "' LIMIT 1");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);



        if ($query->rowCount() > 0) { // If the query got any results
            $user_data = $result;

            if ($user_data['password'] == $password) { // If what the user entered matched the database
                $_SESSION['idCustomer'] = $user_data['idCustomer']; // Create a session that logs the user in
                redirect('CarSearch.html');// Redirect the user to the homepage
                
            }
            else if($user_data['password']!=$password) 
            {
                //Only happens when just password is incorrect
               redirect("index.php");
            }
            else{
                //When both are incorrect
                redirect("index.php");
            }
        }
        else{
            // When password is incorrect
            redirect("index.php");
        }
    }

}

?>
