<?php
include 'php/connection.php';
session_start();
if(isset($_SESSION['type'])){
    echo 'set';
    echo $_SESSION['type'];
}else{
    echo 'unset';
}
?>