<?php
    include 'php/connection.php';
    //admin object
    $category = $sqlConnection->query("SELECT category FROM donation WHERE id='D-79999676076';")->fetch_object()->category;
    echo $totalDonations = (int)$sqlConnection->query("SELECT total FROM categories WHERE categoryName='$category'")->fetch_object()->total + 1;

?>