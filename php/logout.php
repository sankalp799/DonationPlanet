<?php
session_start();
if(!empty($_SESSION['type'])){
    session_unset();
    header("location: ../pages/login.php");
}
?>