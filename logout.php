<?php
session_start();
include "redirect.php";

if(isset($_SESSION['idCustomer']))
{
    unset($_SESSION['idCustomer']);
}
redirect("index.php");
die;