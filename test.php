<?php
    include 'php/connection.php';
    //admin object
    $adminObj = $sqlConnection->query("SELECT id, name, pass FROM admin WHERE id='admin@helpinghand.com';");
    $adminObj = $adminObj->fetch_array();
    echo $adminObj[1];
    /*
    if(password_verify("mcflono123", $adminObj->pass)){
        header('location: ../admin/admin.php');
                $_SESSION['id'] = $adminObj->id;
                $_SESSION['name'] = $adminObj->name;
    }else{
        echo "0";
    }
    */
?>