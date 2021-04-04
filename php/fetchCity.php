<?php
    include 'connection.php';
    $stateCode = $_POST['stateCode'];
    if(boolval($stateCode)){
        $cities = $sqlConnection->query("SELECT *FROM city WHERE stateID='$stateCode';");
        while($city = $cities->fetch_array()){
        echo '<option value='.$city[1].'>'.$city[1].'</option>';
        }
    }else{
        echo '<option value="--City--">--City--</option>';
    }
    
?>