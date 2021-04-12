<?php
    include 'connection.php';
    $stateCode = $_POST['stateCode'];
        $cities = $sqlConnection->query("SELECT *FROM city WHERE stateID='$stateCode';");
        while($city = $cities->fetch_array()){
        $city[1] = str_replace(" ", "_", $city[1]);
        echo '<option value='."$city[1]".' stateCode='.$stateCode.' onclick="printCity(this)">'.$city[1].'</option>';
    }
?>