<?php

include "checkLogin.php";
include "redirect.php";
include "databaseTemplate.php";
session_start();
$user_data = check_login($pdo);
if (isset($user_data)) { // if the user is not logged in, redirect them to the login page
    redirect('CarSearch.html');
}




$displayInvalidPassword = "false";
$displayInvalidUsername = "false";

if (isset($_GET['username'])) {
    $displayInvalidUsername = $_GET['username'];
}
if (isset($_GET['password'])) {
    $displayInvalidPassword = $_GET['password'];
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #3a499e;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #3a499e;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
        }

        .cancelbtn {
            width: 100%;
        }

        .popup .overlay {

            position: fixed;

            top: 0px;

            left: 0px;

            width: 100vw;

            height: 100vh;

            background-color: rgba(0, 0, 0, 0.7);

            z-index: 1;

            display: none;

        }



        .popup .popupContent {


            position: absolute;

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

            color: #fff;

        }

        .popup .close-btn {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            height: 30px;
            width: 30px;
            background: #3a499e;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;

        }



        .popup.active .overlay {

            display: block;

        }



        .popup.active .popupContent {

            transition: all 300ms ease-in-out;

            transform: translate(-50%, -50%) scale(1);

        }
    </style>
</head>

<body>

    <div class="popup" id="popup-1">

        <div class="overlay"></div>

        <div class="popupContent">

            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <div>
                <H1>Plese enter your First Name</H1>
	
	<form action="insertCustomer1.php" method="POST">

	<input type="text" name="firstName">
	<H1>Plese enter your Last Name</H1>
	<input type="text" name="surname">
	<H1>Plese enter a password</H1>
  <input type="text" name="password">
	
	<input type="submit" value="Register">
	<img src="LogoEmS.png" alt="Logo" class="avatar">
	</form></div>
        </div>
    </div>

    <button class="btn btn-primary " onclick="togglePopup()">Sign Up</button>
    <form action="login.php" method="post" class="loginForm">
        <div class="imgcontainer">
            <img src="LogoEmS.png" alt="Logo" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <?php
            if ($displayInvalidUsername == "true") {
                echo "<div class='container-fluid'>Incorrect Username</div>";
            }
            ?>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <div class="container-fluid">
                <?php
                if ($displayInvalidPassword == "true") {
                    echo "Incorrect Password";
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Login</button>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>


</body>
<script>
    function Openform() {

        document.getElementById('form1').style.display = '';

    }
</script>



<script>
    function togglePopup() {

        document.getElementById("popup-1").classList.toggle("active");

    }
</script>

</html>