<?php
    require("php/connection.php");
    $result = $sqlConnection->query("SELECT count(email) AS email, count(contact) AS contact FROM donatorcred WHERE email='sankyani@gmail.com';");
    $resultObj = $result->fetch_object();
    if($resultObj->email > 0 || $resultObj->contact > 0){
        echo "0";
    }else{
        echo "1";
    }
?>