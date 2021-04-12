<?php
    include 'connection.php';
    $stateCode = $_POST['stateCode'];
        $cities = $sqlConnection->query("SELECT *FROM city WHERE stateID='$stateCode';");
        while($city = $cities->fetch_array()){
        $userCity = str_replace(" ", "_", $city[1]);
        echo '<option value='."$userCity".' stateCode='.$stateCode.' onclick="printCity(this)">'.$city[1].'</option>';
    }
?>