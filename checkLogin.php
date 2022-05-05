<?php
function check_login($pdo)
{
    if(isset($_SESSION['idCustomer'])) // If we have an active session, then return all the data related to that user
    {
        $userid = $_SESSION['idCustomer'];
        $query= $pdo->prepare("SELECT * FROM Customer WHERE idCustomer=? LIMIT 1");
        $query->execute([$userid]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            return $result;
        }

    }
    
    
}
?>