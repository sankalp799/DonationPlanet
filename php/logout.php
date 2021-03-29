<?php
session_start();
if(isset($_SESSION['type']) || isset($_SESSION['id'])){
    session_unset();
    header("location: ../pages/login.php");
}
?>