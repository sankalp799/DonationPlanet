<?php
    include "php/connection.php";
    $icons = $sqlConnection->query('SELECT *FROM categories;');
    <div>
    while($icon = $icons->fetch_array()){
        echo '$icon[2]';
    }
    </div>
?>