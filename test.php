<?php
include 'php/connection.php';
$str = "Dadra and Nagar Haveli";
$str = str_replace(" ", "-", $str);
echo $str;
?>